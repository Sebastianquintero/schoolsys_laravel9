<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Materia;



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
        'fk_colegio',
        'foto_path',
    ];

    protected $hidden = ['contrasena'];

    // Para que created_at llegue como Carbon si lo usas en la vista
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
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
    public function getFotoUrlAttribute()
    {
        if ($this->foto_path && Storage::disk('public')->exists($this->foto_path)) {
            return Storage::url($this->foto_path);
        }
        return asset('images/placeholder.jpg'); // imagen por defecto
    }

    public function materiasDictadas(): HasMany
    {
        return $this->hasMany(Materia::class, 'fk_docente', 'id_usuario');
    }

}