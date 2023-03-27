<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use App\Models\User;
use App\Services\ClienteService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClienteController extends Controller
{
    public $httpClient;  

    public function __construct(ClienteService $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $clientes = ClienteModel::select(
                'id',
                'nombres',
                'apellidos',
                'zona',
                'dni',
                'estado_civil',
                'fecha_nacimiento',
                'telefono',
            )->get();

            return DataTables::of($clientes)->addColumn('action',function($cliente){
                $acciones = "<button class='btn-editar btn btn-sm btn-primary rounded-circle update' id='$cliente'>".
                                    "<i class='fa fa-edit' aria-hidden='true'></i>".
                             "</button>";
                $acciones .= "<button class='btn-eliminar btn btn-sm btn-danger rounded-circle delete' id='$cliente->id'>".
                                "<i class='fa fa-trash'></i>".
                             "</button>";
                return $acciones;
            })->rawColumns(['action'])
            ->toJson();
        }

        return view("page.index");
    }
    public function collection()
    {
        return DataTables::of($this->httpClient->data())->toJson();
    }
    public function collection_delete()
    {
        return DataTables::of($this->httpClient->data_delete())->toJson();
    }
    public function store(Request $request)
    {
        $this->httpClient->save($request);

        return response()->json([
            'message' => 'Cliente guardado correctamente'
        ]);
    }
    public function update(Request $request)
    {
        $this->httpClient->update($request);

        return response()->json([
            'message' => 'Cliente actualizado correctamente'
        ]);
    }
    public function destroy(Request $request)
    {
        $this->httpClient->delete($request); 
        return response()->json([
            'message' => 'Cliente eliminado correctamente'
        ]);
    }
}
