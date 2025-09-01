<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';
    protected $primaryKey = 'id_matricula';
    protected $fillable = [
        'fk_estudiante',
        'fk_curso',
        'anio_escolar',
        'estado',
        'resultado'];

    public function estudiante() { 
        return $this->belongsTo(Estudiante::class, 'fk_estudiante', 'id_estudiante'); }
    public function curso()      { 
        return $this->belongsTo(Curso::class, 'fk_curso', 'id_curso'); }

    // Scopes útiles para filtros
    public function scopeAnio($q,$anio){ return $anio? $q->where('anio_escolar',$anio) : $q; }
    public function scopeCurso($q,$curso){ return $curso? $q->where('fk_curso',$curso) : $q; }
    public function scopeEstado($q,$estado){ return $estado? $q->where('estado',$estado) : $q; }
    public function scopeResultado($q,$res){ return $res? $q->where('resultado',$res) : $q; }

    
}
