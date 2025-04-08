<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Proxmox;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\ProxmoxFactory;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\ProxmoxNodeStatusProvider;

class ProxmoxFactoryTest extends TestCase
{
    public function testInvocation()
    {
        $statusProvider = $this->createMock(ProxmoxNodeStatusProvider::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())->method('get')
            ->with(ProxmoxNodeStatusProvider::class)->willReturn($statusProvider);
        $factory = new ProxmoxFactory();

        $this->assertInstanceOf(Proxmox::class, $factory($container, ''));
    }
}