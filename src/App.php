<?php

namespace MDF;

use MDF\DI\Container;
use MDF\Http\Request;
use MDF\Http\Response;
use MDF\Router\Router;

class App
{
    public Request $request;
    public Response $response;
    public Router $router;
    public Container $container;

    public function __construct()
    {
        $this->container = new Container();
        $this->request = $this->container->getContainer()->make('MDF\Http\Request');
        $this->router = $this->container->getContainer()->make('MDF\Router\Router');
    }

    public function handleRequest() {
        $this->response = $this->router->handleRequest($this->request);

        return $this;
    }

    public function sendResponse()
    {
        echo $this->response->getContent();
    }
}