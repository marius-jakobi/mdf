<?php


namespace MDF\Router;


class Route
{
    const CONTROLLER_NAMESPACE = "App\\Controller\\";

    public string $method;
    public string $uri;
    public string $controller;
    public string $action;

    public static function get($uri, $controller, $action)
    {
        return static::createRoute('get', $uri, $controller, $action);
    }

    public static function post($uri, $controller, $action)
    {
        return static::createRoute('post', $uri, $controller, $action);
    }

    public static function put($uri, $controller, $action)
    {
        return static::createRoute('put', $uri, $controller, $action);
    }

    public static function delete($uri, $controller, $action)
    {
        return static::createRoute('delete', $uri, $controller, $action);
    }

    private static function createRoute(string $method, string $uri, string $controller, string $action) {
        $route = new static();
        $route->method = strtoupper($method);
        $route->uri = $uri;
        $route->controller = self::CONTROLLER_NAMESPACE . $controller;
        $route->action = $action;

        return $route;
    }
}