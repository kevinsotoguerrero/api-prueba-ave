<?php

namespace Tests\Unit;

use App\Models\Clientes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteGetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */


    public function test_get_cliente()
    {
        // Crear un cliente existente en la base de datos
        $cliente = Clientes::factory()->create();

        // Realizar la solicitud GET para obtener el cliente
        $response = $this->get("/api/clientes");

        // Asegurarse de que la solicitud haya sido exitosa
        $response->assertStatus(200);



    }


}
