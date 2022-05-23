<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $fillable = [
        'idAlumno',
        'alumno',
        'idDocente',
        'idExamen',
        'titulo',
        'intentos',
        'promedio',
    ];
}
