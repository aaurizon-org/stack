<?php

final class MiddlewareStackTest extends PHPUnit\Framework\TestCase
{
    public function testImplementInterface()
    {
        $this->assertInstanceOf(\Psr\Http\Server\RequestHandlerInterface::class, new \Kiss\MiddlewarePipe(new RequestHandlerStub()));
    }
}
