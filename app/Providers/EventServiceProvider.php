<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
// IMPORTA AMBOS CON ALIAS PARA EVITAR CHOQUE
use Spatie\Activitylog\Facades\Activity as ActivityLog;   // Facade
use Spatie\Activitylog\Models\Activity as ActivityModel; // Modelo (si lo usas en el saving)
use Illuminate\Support\Facades\Event;
use Spatie\Activitylog\Models\Activity;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        ActivityLog::disableLogging();   // <- APAGA todo el logging
        /*
        Activity::saving(function (Activity $activity) {
            if (auth()->check()) {
                $activity->causer()->associate(auth()->user()); // usuario que actúa
                $activity->ip_address = request()->ip();         // puedes agregar columna custom si quieres
            }
        });*/
        
    }

}
