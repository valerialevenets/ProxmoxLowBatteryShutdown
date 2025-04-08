<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Proxmox;

use Corsinvest\ProxmoxVE\Api\PveClient;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\PveClientFactory;

class PveClientFactoryTest extends TestCase
{
    public function testInvocation()
    {
        $configProvider = $this->createMock(ConfigProvider::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())->method('get')
            ->with(ConfigProvider::class)->willReturn($configProvider);
        $factory = new PveClientFactory();

        $this->assertInstanceOf(PveClient::class, $factory($container, ''));
    }
}