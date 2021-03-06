<?php


namespace MDF\Router;


use MDF\DI\Container;
use MDF\Http\Request;
use MDF\Http\Response;

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;

class Router
{
    private Dispatcher $dispatcher;

    /**
     * Router constructor.
     */
    public function __construct() {
        $this->initDispatcher();
    }

    public function initDispatcher()
    {
        $this->dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $r) {
            $routes = include("../app/routes.php");

            foreach ($routes as $route) {
                $r->addRoute($route->method, $route->uri, [$route->controller, $route->action]);
            }
        });
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handleRequest(Request $request) {
        $route = $this->dispatcher->dispatch($request->getMethod(), $request->getRequestUri());

        $content = '';

        switch ($route[0]) {
            case Dispatcher::NOT_FOUND:
                $content = '404 Not Found';
                break;

            case Dispatcher::METHOD_NOT_ALLOWED:
                $content = '405 Method Not Allowed';
                break;

            case Dispatcher::FOUND;
                $controller = $route[1];
                $parameters = $route[2];


                $content = call_user_func_array($controller, $parameters);
        }

        $response = new Response();
        $response->setContent($content);

        return $response;
    }
}