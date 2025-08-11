<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensaje extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mensajes';
    protected $primaryKey = 'id_mensaje';
    public $timestamps = false;
    protected $casts = [
        'fecha_envio'    => 'datetime',
        'fecha_creacion' => 'datetime',
        'deleted_at'     => 'datetime',
    ];
    protected $fillable = [
        'remitente',
        'destinatario',
        'asunto',
        'contenido',
        'leido',
        'fecha_creacion',
        'fecha_envio',
        'archivo_adjunto',
    ];

    // Relaciones
    public function remitenteUsuario()
    {
        return $this->belongsTo(Usuario::class, 'remitente', 'id_usuario');
    }

    public function destinatarioUsuario()
    {
        return $this->belongsTo(Usuario::class, 'destinatario', 'id_usuario');
    }
}
