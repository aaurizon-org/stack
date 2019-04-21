<?php

namespace Kiss;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class MiddlewareStack extends AbstractMiddlewareStack implements RequestHandlerInterface
{
    /**
     * @var RequestHandlerInterface
     */
    protected $handler;

    /**
     * MiddlewarePipe constructor.
     * @param RequestHandlerInterface $handler
     */
    public function __construct(RequestHandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    protected function handler(ServerRequestInterface $request): ResponseInterface
    {
        return $this->handler->handle($request);
    }
}
