<?php

namespace Database\Seeders;

use App\Models\ClienteModel;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $nombres = [
            'Ana Laura',
            'Anna',
            'Marcelo',
            'Analy',
            'Fernando',
            'Mario',
            'Augusto',
            'Santiago',
            'Hernand',
            'Ronald',
            'Daniel',
            'Danna',
            'Diana',
            'Luis',
            'Alberto'
        ];
        $apellidos = [
            'Arce',
            'Antelo',
            'Arias',
            'Castro',
            'Castillo',
            'Castañeda',
            'Duran',
            'Dias',
            'Hernandez',
            'Fernandez',
            'Llorente',
            'Souza',
            'Pereira',
            'Cezdepes',
            'Valencia'
        ];
        $zonas = [
            'Norte',
            'Sur',
            'Este',
            'Oeste'
        ];
        $estado_civiles = [
            'casado',
            'soltero',
            'viudo',
            'divorciado'
        ];

        for ($i=0; $i < count($nombres); $i++) { 
            ClienteModel::create([
                'nombres' => $nombres[$i],
                'apellidos' => $apellidos[$i],
                'zona' => $zonas[rand(0,count($zonas) - 1)],
                'dni' => rand(6111111,9999999),
                'estado_civil' => $estado_civiles[rand(0,count($estado_civiles) - 1)],
                'fecha_nacimiento' => date('Y-m-d',strtotime(strval(rand(1980,1999)) .'-'. strval(rand(1,12)) . '-' . strval(rand(1,28)))) ,
                'telefono' => strval(rand(60000000,799999999)),
            ]);    
        }        
    }
}
