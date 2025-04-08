<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Exception;

use PHPUnit\Framework\TestCase;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Exception\ExtendedException;

class ExtendedExceptionTest extends TestCase
{
    private array $messages = [];
    private ExtendedException $sut;

    protected function setUp(): void
    {
        $this->messages = [
            'message1',
            'message2',
        ];
        $this->sut = new ExtendedException($this->messages);
    }
    public function testSutGetMessages(): void
    {
        $this->assertEquals($this->messages, $this->sut->getMessages());
    }
    public function testSutExtendsException(): void
    {
        $this->assertInstanceOf(\Exception::class, $this->sut);
    }
}