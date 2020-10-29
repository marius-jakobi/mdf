<?php

namespace MDF;

use MDF\Http\Request;

require "vendor/autoload.php";
echo "<pre>";
$request = new Request();
$router = new Router();

$app = new App($request, $router);
$app->sendResponse();