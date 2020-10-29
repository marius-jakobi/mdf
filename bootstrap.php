<?php

namespace MDF;

use MDF\DI\Container;

require "vendor/autoload.php";

$app = new App();

$app->handleRequest()
    ->sendResponse();