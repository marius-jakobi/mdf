<?php

namespace MDF;

use MDF\DI\Container;
use MDF\Http\Request;
use MDF\Router\Router;

require "vendor/autoload.php";

$app = new App();
$app->sendResponse();