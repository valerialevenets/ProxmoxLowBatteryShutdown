<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Proxmox;

use Corsinvest\ProxmoxVE\Api\PveClient;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\ProxmoxNodeStatusProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\ProxmoxNodeStatusProviderFactory;

class ProxmoxNodeStatusProviderFactoryTest extends TestCase
{
    public function testInvocation()
    {
        $pveClient = $this->createMock(PveClient::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())->method('get')
            ->with(PveClient::class)->willReturn($pveClient);
        $factory = new ProxmoxNodeStatusProviderFactory();

        $this->assertInstanceOf(ProxmoxNodeStatusProvider::class, $factory($container, ''));
    }
}