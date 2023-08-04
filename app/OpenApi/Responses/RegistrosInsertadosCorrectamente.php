<?php

namespace App\OpenApi\Responses;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class RegistrosInsertadosCorrectamente extends ResponseFactory
{
    public function build(): Response
    {
        $response = Schema::object()->properties(
            //Schema::string('status')->example('ok'),
            Schema::string('message')->example('registro insertado correctamente'),
            Schema::array('data')->example([]),
        );


        return Response::ok()
            ->description('Registro insertado correctamente')
            ->content(
                MediaType::json()->schema($response)
            );
    }
}
