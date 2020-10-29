<?php


namespace MDF\Router;


use DI\Container;
use MDF\Http\Request;
use MDF\Http\Response;

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;

class Router
{
    private const CONTROLLER_NAMESPACE = "App\\Controller\\";

    private Dispatcher $dispatcher;

    /**
     * Router constructor.
     */
    public function __construct() {
        $this->dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $r) {
            $routes = include("../app/routes.php");

            foreach ($routes as $route) {
                $r->addRoute(strtoupper($route[0]), $route[1], [self::CONTROLLER_NAMESPACE . $route[2], $route[3]]);
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