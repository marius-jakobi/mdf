<?php

namespace MDF;

use MDF\DI\DIContainer as Container;
use MDF\Http\Request;
use MDF\Router\Router;

require "vendor/autoload.php";

$container = new Container();

$request = new Request();
$router = new Router();

$app = new App($request, $router, $container);
$app->sendResponse();