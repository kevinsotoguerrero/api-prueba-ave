<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    protected $model = Clientes::class;

    public function definition()
    {
        /* return [
            'nombre' => $this->faker->name,
            'identificacion' => $this->faker->phoneNumber,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'email' => $this->faker->unique->safeEmail,
        ]; */

        return [
            'nombre' => "prueba",
            'identificacion' => "123456",
            'telefono' => "879456",
            'direccion' => "calle 1",
            'email' => "prueba@prueba.com",
        ];
    }
}
