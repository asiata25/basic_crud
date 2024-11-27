<?php
include_once "Router.php";

class App
{
    protected $routes;
    protected $controller;
    protected $method;
    protected $params = [];

    public function __construct()
    {
        $this->routes = Router::$paths;

        $url = $this->parseUrl();
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$requestMethod] ?? [] as $path => $handler) {
            $pattern = preg_replace('/\{[^\/]+\}/', '([^/]+)', $path);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $url, $matches)) {
                [$controller, $method] = explode("@", $handler);
                $this->controller = $controller;
                $this->method = $method;

                $this->params = array_slice($matches, 1);
                break;
            } else {
                $this->controller = "ErrorController";
                $this->method = "notFound";
            }
        }

        require_once "../app/controller/" . $this->controller . ".php";
        $this->controller = new $this->controller;
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    function parseUrl()
    {
        $requestUri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $requestUri = rtrim($requestUri, "/");
        $requestUri = filter_var($requestUri, FILTER_SANITIZE_URL);
        $requestUri = $requestUri != "" ? $requestUri : "/";

        return $requestUri;
    }
}
