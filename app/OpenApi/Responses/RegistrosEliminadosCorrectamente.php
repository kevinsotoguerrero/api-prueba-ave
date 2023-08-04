<?php

namespace App\OpenApi\Responses;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class RegistrosEliminadosCorrectamente
 extends ResponseFactory
{
    public function build(): Response
    {
        $response = Schema::object()->properties(
            //Schema::string('status')->example('ok'),
            Schema::string('message')->example('Cliente eliminado correctamente'),

        );


        return Response::ok()
            ->description('Cliente eliminado correctamente')
            ->content(
                MediaType::json()->schema($response)
            );
    }
}
