<?php

namespace App\Http\Controllers;

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
            $clientes = $this->httpClient->data();
            return DataTables::of($clientes)
            ->toJson();
        }

        return view("page.index");
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