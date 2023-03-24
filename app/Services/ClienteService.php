<?php

namespace App\Services;

use App\Models\ClienteModel;
use Illuminate\Http\Request;

    class ClienteService {
        public function save(Request $request){
            $obj = new ClienteModel();
            $obj->nombres = $request->nombres; 
            $obj->apellidos = $request->apellidos; 
            $obj->direccion = $request->direccion; 
            $obj->dni = $request->dni; 
            $obj->estado_civil = $request->estado_civil; 
            $obj->fecha_nacimiento = $request->fecha_nacimiento; 
            $obj->telefono = $request->telefono;
            $obj->save(); 
        }    
        public function update(Request $request){
            $obj = ClienteModel::find($request->id);
            $obj->nombres = $request->nombres; 
            $obj->apellidos = $request->apellidos; 
            $obj->direccion = $request->direccion; 
            $obj->dni = $request->dni; 
            $obj->estado_civil = $request->estado_civil; 
            $obj->fecha_nacimiento = $request->fecha_nacimiento; 
            $obj->telefono = $request->telefono;
            $obj->update(); 
        }    
        public function delete(Request $request){
            $obj = ClienteModel::find($request->id);
            $obj->delete(); 
        }   
    }