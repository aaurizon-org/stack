<?php

class RequestHandlerStub implements \Psr\Http\Server\RequestHandlerInterface
{
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        return new \Zend\Diactoros\Response\HtmlResponse('');
    }
}
