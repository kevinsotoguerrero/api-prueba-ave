<?php

namespace Tests\Unit;

use App\Models\Clientes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteUpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */


    public function test_update_cliente()
    {
        // Crear un cliente existente en la base de datos
        $cliente = Clientes::factory()->create();

        // Datos para actualizar el cliente
        $data = [
            'nombre' => 'Nuevo Nombre',
            'identificacion' => '111111',
            'direccion' => 'calle 1',
            'telefono' => '22222222',
            'email' => 'nuevo@example.com'
        ];

        // Realizar la solicitud PUT para actualizar el cliente
        $response = $this->put("/api/clientes/{$cliente->id}", $data);

        // Asegurarse de que la actualización haya sido exitosa
        $response->assertStatus(200);

        // Recargar el modelo del cliente desde la base de datos
        $clienteActualizado = $cliente->fresh();

        // Asegurarse de que los datos del cliente se hayan actualizado correctamente
        $this->assertEquals($data['nombre'], $clienteActualizado->nombre);
        $this->assertEquals($data['identificacion'], $clienteActualizado->identificacion);
        $this->assertEquals($data['telefono'], $clienteActualizado->telefono);
        $this->assertEquals($data['direccion'], $clienteActualizado->direccion);
        $this->assertEquals($data['email'], $clienteActualizado->email);
        // Asegurar que otros datos también se hayan actualizado correctamente...
    }


}
