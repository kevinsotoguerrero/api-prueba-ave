<?php

namespace App\OpenApi\Responses;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class RegistrosEncontrados extends ResponseFactory
{
    public function build(): Response
    {
        $response = Schema::object()->properties(
            //Schema::string('status')->example('ok'),
            Schema::string('message')->example('registros encontrados con exito'),
            Schema::array('data')->example([]),

        );


        return Response::ok()
            ->description('Registros encontrados con exito')
            ->content(
                MediaType::json()->schema($response)
            );
    }
}
