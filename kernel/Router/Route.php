<?php

namespace App\Kernel\Router;

class Route
{
    public function __construct(
        private string $uri,
        private string $method,
        private $action
    )
    {
    }
    public static function get(string $uri, $action): static
    {
        return new static($uri, method:'GET', action:  $action);
    }

    public static function post(string $uri, $action): static
    {
        return new static($uri, method:'GET', action: $action);
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getAction()
    {
        return $this->action;
    }
    public function getMethod(): string
    {
        return $this->method;
    }

}