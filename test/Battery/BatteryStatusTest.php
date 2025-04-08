<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Battery;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\AdapterInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;

class BatteryStatusTest extends TestCase
{
    private MockObject $adapter;
    private BatteryStatus $sut;
    protected function setUp(): void
    {
        $this->adapter = $this->createMock(AdapterInterface::class);
        $this->sut = new BatteryStatus($this->adapter);
    }

    public function testGetChargeLevel()
    {
        $level = rand(20, 80);
        $this->adapter->expects($this->once())
            ->method('getBatteryLevel')->willReturn($level);
        $this->assertEquals($level, $this->sut->getChargeLevel());
    }
}