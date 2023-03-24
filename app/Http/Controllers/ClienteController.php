<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // public $httpClient;  

    // public function __construct(ClienteService $httpClient)
    // {
    //     $this->httpClient = $httpClient;
    // }

    public function index(Request $request)
    {
        return view("page.index",[

        ]);
    }


    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        // $data = $this->httpClient->save($request);

        // return response()->json([
        //     'data' => $data,
        //     'message' => 'Cliente Agregado exitosamente',
        //     'ok' => true
        // ],200);
    }


    public function show(ClienteModel $cliente)
    {
        
    }
   
    public function edit(ClienteModel $cliente)
    {
        
    }

    public function update(Request $request)
    {
        // $data = $this->httpClient->update($request);
        // return response()->json([
        //     'data' => $data,
        //     'message' => 'Cliente Agregado exitosamente',
        //     'ok' => true
        // ],200);
    }

   
    public function destroy(string $id)
    {
        //
    }
}
