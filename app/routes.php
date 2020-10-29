<?php

use \MDF\Router\Route;

return [
    Route::get('/', 'IndexController', 'index'),
    Route::get('/hello/{name}', 'IndexController', 'hello'),
];