<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'tipo_documento',
        'numero_documento',
        'contrasena',
        'fecha_nacimiento',
        'numero_telefono',
        'correo',
        'fk_rol',
        'fk_colegio'
    ];

    protected $hidden = ['contrasena'];

    // Laravel buscará aquí la contraseña al hacer login
    public function getAuthPassword()
    {
        return $this->contrasena;
    }


    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'fk_usuario', 'id_usuario');
    }
    public function colegio()
    {
        return $this->belongsTo(Colegio::class, 'fk_colegio', 'id_colegio');
    }
    public function docente()
    {
        return $this->hasOne(Docente::class, 'fk_usuario');
    }

}