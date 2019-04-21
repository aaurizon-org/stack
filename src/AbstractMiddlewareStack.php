<?php

namespace Kiss;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class AbstractMiddlewareStack implements RequestHandlerInterface
{
    /**
     * @var MiddlewareInterface[]
     */
    private $middlewares = [];

    /**
     * @var int iterator
     */
    private $it = 0;

    /**
     * @param MiddlewareInterface $middleware
     * @return $this
     */
    public function pipe(MiddlewareInterface $middleware)
    {
        $this->middlewares[] = $middleware;

        return $this;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        return $this->it < count($this->middlewares) ? $this->middlewares[$this->it++]->process($request, $this) : $this->handler($request);
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    abstract protected function handler(ServerRequestInterface $request) : ResponseInterface;
}
