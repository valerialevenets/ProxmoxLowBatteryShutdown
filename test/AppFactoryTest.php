<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\App;
use Valerialevenets94\ProxmoxLowBatteryShutdown\AppFactory;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Notification\Notifier;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;

class AppFactoryTest extends TestCase
{
    private MockObject $container;
    protected function setUp(): void
    {
        $this->container = $this->createMock(ContainerInterface::class);
    }

    public function testInvocation(): void
    {
        $this->configureContainer(
            [
                ConfigProvider::class,
                Proxmox::class,
                BatteryStatus::class,
                Notifier::class
            ]
        );

        $factory = new AppFactory();
        $this->assertInstanceOf(App::class, $factory($this->container, ''));
    }
    private function configureContainer(array $classes)
    {
        $out = [];
        foreach ($classes as $class) {
            $out[] = [$class, $this->createMock($class)];
        }
        $this->container->method('get')
            ->willReturnMap($out);
    }
}