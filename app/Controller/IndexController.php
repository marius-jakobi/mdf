<?php


namespace App\Controller;


class IndexController
{
    public function index() {
        return "Hello!";
    }

    public function hello(string $name)
    {
        return "Hello $name!";
    }
}