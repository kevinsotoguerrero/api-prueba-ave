<?php

namespace Tests\Unit;

use App\Models\Clientes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_create_cliente()
    {
        $cliente = Clientes::factory()->create();


        $this->assertTrue(Clientes::where('nombre', $cliente->nombre)->where('email', $cliente->email)->exists());
    }

}
