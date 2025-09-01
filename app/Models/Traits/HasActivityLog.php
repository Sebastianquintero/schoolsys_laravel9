<?php

namespace App\Models\Traits;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;

trait HasActivityLog
{
    use LogsActivity;

    /**
     * Configuración para Spatie v4.
     */
    public function getActivitylogOptions(): LogOptions
    {
        // Por defecto: usa el nombre de log del modelo, no envíes logs vacíos y guarda solo cambios
        $options = LogOptions::defaults()
            ->useLogName($this->getLogNameToUse())
            ->dontSubmitEmptyLogs()
            ->logOnlyDirty();

        // Si el modelo define qué atributos auditar, respétalo.
        if (property_exists($this, 'activityLogAttributes') && is_array($this->activityLogAttributes)) {
            $options = $options->logOnly($this->activityLogAttributes);
        }
        // Compatibilidad: si dejaste static $logAttributes (v3)
        elseif (property_exists(static::class, 'logAttributes') && is_array(static::$logAttributes)) {
            $options = $options->logOnly(static::$logAttributes);
        }
        // Si no defines nada, audita los fillable
        else {
            $options = $options->logFillable();
        }

        return $options;
    }

    /**
     * Nombre a usar en el log si el modelo define $logName;
     * cae al nombre de la clase si no.
     */
    public function getLogNameToUse(): string
    {
        return property_exists($this, 'logName') && !empty($this->logName)
            ? $this->logName
            : class_basename($this);
    }

    /**
     * Mensaje legible por evento (created/updated/deleted).
     */
    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->getLogNameToUse().' '.$eventName;
    }

    /**
     * Adjunta metadata útil (usuario, IP, URL) cuando haya request/usuario.
     */
    public function tapActivity(Activity $activity, string $eventName)
    {
        try {
            if (auth()->check()) {
                $activity->causer()->associate(auth()->user());
            }

            $props = $activity->properties ?? collect();
            $extra = [
                'ip'  => request()->ip(),
                'url' => request()->fullUrl(),
            ];

            $activity->properties = $props->merge(['extra' => $extra]);
        } catch (\Throwable $e) {
            // En CLI/jobs sin request: ignorar
        }
    }
}