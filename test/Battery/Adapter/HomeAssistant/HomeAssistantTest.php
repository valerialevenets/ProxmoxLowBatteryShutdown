<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Battery\Adapter\HomeAssistant;

use PHPUnit\Framework\TestCase;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\AdapterInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\HomeAssistant\HomeAssistant;

class HomeAssistantTest extends TestCase
{
    private HomeAssistant $sut;
    protected function setUp(): void
    {
        $this->sut = new HomeAssistant('', '');
    }
    public function testSutImplementsAdapterInterface(): void
    {
        $this->assertInstanceOf(AdapterInterface::class, $this->sut);
    }
    //TODO add more tests after the refactor
}