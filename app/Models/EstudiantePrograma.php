<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudiantePrograma extends Model
{
    use HasFactory;
    protected $fillable = ['id_estudiante', 'id_programa'];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'id_programa');
    }
}
