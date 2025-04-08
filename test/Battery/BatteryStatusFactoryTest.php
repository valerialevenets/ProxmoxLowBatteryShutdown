<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Battery;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\AdapterInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatusFactory;

class BatteryStatusFactoryTest extends TestCase
{
    public function testInvocation()
    {
        $adapter = $this->createMock(AdapterInterface::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())->method('get')
            ->with(AdapterInterface::class)->willReturn($adapter);
        $factory = new BatteryStatusFactory();

        $this->assertInstanceOf(BatteryStatus::class, $factory($container, ''));
    }
}