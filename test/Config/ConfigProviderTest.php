<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Config;

use PHPUnit\Framework\TestCase;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;

class ConfigProviderTest extends TestCase
{
    private ConfigProvider $sut;
    protected function setUp():void
    {
        $this->sut = new ConfigProvider(['PVE_URI' => 'someUrl']);
    }

    public function testGetPveUri()
    {
        $this->assertEquals('someUrl', $this->sut->getPveUri());
    }

    //TODO more tests, add missing field validation
}