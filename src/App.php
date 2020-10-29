<?php


namespace MDF;


use MDF\Http\Request;
use MDF\Http\Response;

class App
{
    public Request $request;
    public Response $response;
    public Router $router;

    public function __construct(Request $request, Router $router) {
        $this->request = $request;
        $this->router = $router;

        $this->response = $this->router->handleRequest($this->request);
    }

    public function sendResponse() {
        echo $this->response->getContent();
    }
}