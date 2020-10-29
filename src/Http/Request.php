<?php


namespace MDF\Http;


class Request
{
    const METHOD_GET = 'get';
    const METHOD_POST = 'post';
    const METHOD_PUT = 'put';
    const METHOD_DELETE = 'delete';

    public array $request;
    public array $query;
    public array $server;
    public array $files;
    public array $cookies;
    public array $headers = [];

    protected $pathInfo;
    protected $requestUri;
    protected $method;

    public function __construct() {
        $this->query = $_GET;
        $this->request = $_POST;
        $this->cookies = $_COOKIE;
        $this->files = $_FILES;
        $this->server = $_SERVER;

        $this->pathInfo = $_SERVER["PATH_INFO"];
        $this->requestUri = $_SERVER["REQUEST_URI"];
        $this->method = $_SERVER["REQUEST_METHOD"];

        foreach (getallheaders() as $key => $value) {
            $this->headers[$key] = $value;
        }
    }
}