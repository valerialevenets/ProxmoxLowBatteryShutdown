<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Battery\Adapter\HomeAssistant;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\HomeAssistant\HomeAssistant;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\HomeAssistant\HomeAssistantFactory;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;

class HomeAssistantFactoryTest extends TestCase
{
    public function testInvocation()
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())
            ->method('get')->with(ConfigProvider::class)
            ->willReturn($this->createMock(ConfigProvider::class));
        $factory = new HomeAssistantFactory();
        $this->assertInstanceOf(
            HomeAssistant::class,
            $factory($container, '')
        );
    }
}