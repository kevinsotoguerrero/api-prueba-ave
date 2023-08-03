<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::all();
        return response()->json([
            'message' => 'registros encontrados con exito',
            'data' => $clientes
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'identificacion' => 'required|string|max:20',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:30',
            'email' => 'required|string|max:30',
        ]);

        $cliente = new Clientes;
        $cliente->nombre = $request->nombre;
        $cliente->identificacion = $request->identificacion;
        $cliente->archivo_identificacion = $request->archivo_identificacion;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->save();

        return response()->json([
            'message' => 'registro insertado correctamente',
            'data' => $cliente
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'identificacion' => 'required|string|max:20',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:30',
            'email' => 'required|string|max:30',
        ]);

        $cliente = Clientes::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'cliente no encontrado'], 404);
        }

        $cliente->nombre = $request->nombre;
        $cliente->identificacion = $request->identificacion;
        $cliente->archivo_identificacion = $request->archivo_identificacion;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;

        $cliente->save();

        return response()->json($cliente, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clientes = Clientes::find($id);

        if (!$clientes) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $clientes->delete();

        return response()->json(['message' => 'Cliente eliminado correctamente'], 200);
    }
}
