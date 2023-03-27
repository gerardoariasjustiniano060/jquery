<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
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
        'fecha_nacimiento' => 'date',
        'telefono' => 'string',
    ];
}
