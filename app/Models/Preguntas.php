<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "idPregunta";
    protected $fillable = [
        'pregunta',
        'opcion1',
        'opcion2',
        'opcion3',
        'correcta',
        'idExamen',
    ];
}
