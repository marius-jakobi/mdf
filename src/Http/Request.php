<?php


namespace MDF\Http;


class Request
{
    public array $request;
    public array $query;
    public array $server;
    public array $files;
    public array $cookies;
    public array $headers = [];

    protected string $requestUri;
    protected string $method;

    /**
     * Request constructor.
     */
    public function __construct() {
        $this->query = $_GET;
        $this->request = $_POST;
        $this->cookies = $_COOKIE;
        $this->files = $_FILES;
        $this->server = $_SERVER;

        $this->requestUri = $_SERVER["REQUEST_URI"];
        $this->method = $_SERVER["REQUEST_METHOD"];

        foreach (getallheaders() as $key => $value) {
            $this->headers[$key] = $value;
        }
    }

    /**
     * @return string
     */
    public function getRequestUri() : string
    {
        return $this->requestUri;
    }

    /**
     * @return string
     */
    public function getMethod() : string
    {
        return $this->method;
    }
}