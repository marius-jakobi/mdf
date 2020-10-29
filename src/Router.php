<?php


namespace MDF;


use MDF\Http\Request;
use MDF\Http\Response;

class Router
{
    public function handleRequest(Request $request) {
        $response = new Response();
        $response->setContent("Response");

        return $response;
    }
}