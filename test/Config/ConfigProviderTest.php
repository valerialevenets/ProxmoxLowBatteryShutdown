<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdownTest\Config;

use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\Exception\ConfigValidationException;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ValueObject\Mode;

class ConfigProviderTest extends TestCase
{
    private array $config = [];
    private ConfigProvider $sut;
    protected function setUp():void
    {
        $modes = [
            Mode::CRON,
            Mode::STANDALONE
        ];
        $this->config = [
            'PVE_URI' => 'uri',
            'PVE_API_TOKEN' => 'token',
            'PVE_NODE_NAME' => 'kksdkladsd',
            'PVE_CERTIFICATE_VALIDATION' => false,
            'HA_URI' => 'skdskdkd',
            'HA_API_TOKEN' => 'jkfjkfdkjka',
            'BATTERY_THRESHOLD' => 85,
            'MODE' => $modes[rand(0,1)],

            'TELEGRAM_CHAT_ID' => '2112',
            'TELEGRAM_TOKEN' => 'agasdgasd',
        ];
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

    #[TestWith(['sskak53'], 'Test with string instead of digits')]
    #[TestWith([5], 'Test with threshold smaller than allowed')]
    #[TestWith([105], 'Test with threshold larger than allowed')]
    #[TestWith([null], 'Test with null threshold')]
    public function testSutConstructorShouldThrowExceptionIfBatteryThresholdIsInvalid(mixed $threshold)
    {
        $this->expectException(ConfigValidationException::class);
        $this->config['BATTERY_THRESHOLD'] = $threshold;
        new ConfigProvider($this->config);
    }
    #[TestWith([null], 'Test with null pve uri')]
    #[TestWith([''], 'Test with empty pve uri')]
    #[TestWith([false], 'Test with negative boolean pve uri')]
    #[TestWith([true], 'Test with positive boolean pve uri')]
    public function testSutConstructorShouldThrowExceptionIfPVEUriIsInvalid(mixed $uri)
    {
        $this->expectException(ConfigValidationException::class);
        $this->config['PVE_URI'] = $uri;
        new ConfigProvider($this->config);
    }

    #[TestWith([null], 'Test with null pve api token')]
    #[TestWith([''], 'Test with empty pve api token')]
    #[TestWith([false], 'Test with negative boolean pve api token')]
    #[TestWith([true], 'Test with positive boolean pve api token')]
    public function testSutConstructorShouldThrowExceptionIfPVEApiTokenIsInvalid(mixed $token)
    {
        $this->expectException(ConfigValidationException::class);
        $this->config['PVE_API_TOKEN'] = $token;
        new ConfigProvider($this->config);
    }

    #[TestWith([null], 'Test with null node name')]
    #[TestWith([''], 'Test with empty node name')]
    #[TestWith([false], 'Test with negative boolean node name')]
    #[TestWith([true], 'Test with positive boolean node name')]
    public function testSutConstructorShouldThrowExceptionIfPVENodeNameIsInvalid(mixed $name)
    {
        $this->expectException(ConfigValidationException::class);
        $this->config['PVE_NODE_NAME'] = $name;
        new ConfigProvider($this->config);
    }

    #[TestWith([null], 'Test with null pve certificate validation')]
    #[TestWith([''], 'Test with empty pve certificate validation')]
    #[TestWith([2], 'Test with integer pve certificate validation')]
    public function testSutConstructorShouldThrowExceptionIfPVECertificateValidationIsInvalid(mixed $validation)
    {
        $this->expectException(ConfigValidationException::class);
        $this->config['PVE_CERTIFICATE_VALIDATION'] = $validation;
        new ConfigProvider($this->config);
    }

    #[TestWith([null], 'Test with null HA uri')]
    #[TestWith([''], 'Test with empty HA uri')]
    #[TestWith([false], 'Test with negative boolean HA uri')]
    #[TestWith([true], 'Test with positive boolean HA uri')]
    public function testSutConstructorShouldThrowExceptionIfHAUriIsInvalid(mixed $uri)
    {
        $this->expectException(ConfigValidationException::class);
        $this->config['HA_URI'] = $uri;
        new ConfigProvider($this->config);
    }

    #[TestWith([null], 'Test with null HA api token')]
    #[TestWith([''], 'Test with empty HA api token')]
    #[TestWith([false], 'Test with negative boolean HA api token')]
    #[TestWith([true], 'Test with positive boolean HA api token')]
    public function testSutConstructorShouldThrowExceptionIfHAApiTokenIsInvalid(mixed $token)
    {
        $this->expectException(ConfigValidationException::class);
        $this->config['HA_API_TOKEN'] = $token;
        new ConfigProvider($this->config);
    }
    #[TestWith([null], 'Test with null mode')]
    #[TestWith([''], 'Test with empty mode')]
    #[TestWith([false], 'Test with negative boolean mode')]
    #[TestWith([true], 'Test with positive boolean mode')]
    public function testSutConstructorShouldThrowExceptionIfModeIsInvalid(mixed $mode)
    {
        $this->expectException(ConfigValidationException::class);
        $this->config['MODE'] = $mode;
        new ConfigProvider($this->config);
    }
}