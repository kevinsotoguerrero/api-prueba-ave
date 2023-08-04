<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\OpenApi\Responses\RegistrosActualizadosCorrectamente;
use App\OpenApi\Responses\RegistrosEliminadosCorrectamente;
use App\OpenApi\Responses\RegistrosEncontrados;
use App\OpenApi\Responses\RegistrosInsertadosCorrectamente;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]

class ClientesController extends Controller
{
    /**
     * Mostrar clientes
     *
     *
     *
     *
     */
    #[OpenApi\Operation(id: 'leerClientes', tags: ['v1'])]
    #[OpenApi\Response(factory: RegistrosEncontrados::class)]
    public function index()
    {
        $clientes = Clientes::all();
        return response()->json([
            'message' => 'registros encontrados con exito',
            'data' => $clientes
        ], 200);
    }

    /**
     * Crear cliente
     *
     *
     *
     *
     */
    #[OpenApi\Operation(id: 'crearCliente', tags: ['v1'])]
    #[OpenApi\Response(factory: RegistrosInsertadosCorrectamente::class)]
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
     * Actualizar cliente
     *
     *
     *
     *
     */
    #[OpenApi\Operation(id: 'actualizarCliente', tags: ['v1'])]
    #[OpenApi\Response(factory: RegistrosActualizadosCorrectamente::class)]
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

        return response()->json([
            'message' => 'registro actualizado correctamente',
            'data' => $cliente
        ], 200);

    }

    /**
     * Eliminar cliente
     *
     *
     *
     *
     */
    #[OpenApi\Operation(id: 'eliminarCliente', tags: ['v1'])]
    #[OpenApi\Response(factory: RegistrosEliminadosCorrectamente::class)]
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
