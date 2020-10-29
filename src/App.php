<?php

namespace MDF;

use MDF\DI\DIContainer as Container;
use MDF\Http\Request;
use MDF\Http\Response;
use MDF\Router\Router;

class App
{
    public Request $request;
    public Response $response;
    public Router $router;
    public Container $container;

    public function __construct(Request $request, Router $router, Container $container) {
        $this->request = $request;
        $this->router = $router;
        $this->container = $container;

        $this->response = $this->router->handleRequest($this->request);
    }

    public function sendResponse() {
        echo $this->response->getContent();
    }
}