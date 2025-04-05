<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Config;

use PHPUnit\Framework\TestCase;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;

class ConfigProviderTest extends TestCase
{
    //TODO add negative test cases
    private array $config = [
        'PVE_URI' => 'uri',
        'PVE_API_TOKEN' => 'token',
        'PVE_NODE_NAME' => 'kksdkladsd',
        'PVE_CERTIFICATE_VALIDATION' => false,
        'HA_URI' => 'skdskdkd',
        'HA_API_TOKEN' => 'jkfjkfdkjka',
        'BATTERY_THRESHOLD' => 85
    ];
    private ConfigProvider $sut;
    protected function setUp():void
    {
        $this->sut = new ConfigProvider($this->config);
    }

    public function testGetPveUri()
    {
        $this->assertEquals($this->config['PVE_URI'], $this->sut->getPveUri());
    }
    public function testGetPveApiToken()
    {
        $this->assertEquals($this->config['PVE_API_TOKEN'], $this->sut->getPveApiToken());
    }
    public function testGetPveNodeName()
    {
        $this->assertEquals($this->config['PVE_NODE_NAME'], $this->sut->getPveNodeName());
    }
    public function testGetPveCertificateValidation()
    {
        $this->assertFalse($this->sut->getPveCertificateValidation());
    }
    public function testGetHaUri()
    {
        $this->assertEquals($this->config['HA_URI'], $this->sut->getHaUri());
    }
    public function testGetHaApiToken()
    {
        $this->assertEquals($this->config['HA_API_TOKEN'], $this->sut->getHaApiToken());
    }
}