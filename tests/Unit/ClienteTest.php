<?php

namespace Tests\Unit;

use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     */
    public function test_create_cliente()
    {
        $user = Clientes::factory()->create([
            'nombre' => 'John',
            'identificacion' => '5632872',
            'telefono' => '78578578',
            'direccion' => 'calle 123',
            'email' => 'john@example.com',
        ]);

        $this->assertTrue(Clientes::where('nombre', 'John')->where('email', 'john@example.com')->exists());
    }
}
