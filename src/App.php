<?php

namespace MDF;

use MDF\Http\Request;
use MDF\Http\Response;
use MDF\Router\Router;

class App
{
    public Request $request;
    public Response $response;
    public Router $router;

    public function __construct() {
        $this->request = new Request();
        $this->router = new Router();

        $this->response = $this->router->handleRequest($this->request);
    }

    public function sendResponse() {
        echo $this->response->getContent();
    }
}