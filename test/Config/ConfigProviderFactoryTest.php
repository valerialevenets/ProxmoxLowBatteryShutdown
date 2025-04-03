<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Config;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProviderFactory;

class ConfigProviderFactoryTest extends TestCase
{
    private ConfigProviderFactory $sut;
    protected function setUp(): void
    {
        $this->sut = new ConfigProviderFactory();
    }
    public function testInvocation()
    {
        $sut = $this->sut;
        $result = $sut($this->createMock(ContainerInterface::class), ConfigProvider::class);
        $this->assertInstanceOf(ConfigProvider::class, $result);
    }
}