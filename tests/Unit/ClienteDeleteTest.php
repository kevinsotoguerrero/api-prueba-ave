<?php

namespace Tests\Unit;

use App\Models\Clientes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteDeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */


    public function test_delete_cliente()
    {
        // Crear un cliente existente en la base de datos
        $cliente = Clientes::factory()->create();



        // Realizar la solicitud PUT para actualizar el cliente
        $response = $this->delete("/api/clientes/{$cliente->id}");

        // Asegurarse de que la actualización haya sido exitosa
        $response->assertStatus(200);


    }
}
