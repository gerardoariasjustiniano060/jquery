<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'zona',
        'dni',
        'estado_civil',
        'fecha_nacimiento',
        'telefono',
    ];

    protected $cast = [
        'nombres' => 'string',
        'apellidos' => 'string',
        'zona' => 'string',
        'dni' => 'string',
        'estado_civil' => 'string',
        'fecha_nacimiento' => 'string',
        'telefono' => 'string',
    ];
}
