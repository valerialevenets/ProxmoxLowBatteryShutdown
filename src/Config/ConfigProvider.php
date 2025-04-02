<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Config;
class ConfigProvider
{
    //TODO add config validation
    public function __construct(private readonly array $config)
    {}

    public function getBatteryThreshold(): int
    {
        return $this->config['BATTERY_THRESHOLD'];
    }
    public function getPveUri(): string
    {
        return $this->config['PVE_URI'];
    }
    public function getPveApiToken(): string
    {
        return $this->config['PVE_API_TOKEN'];
    }
    public function getPveNodeName(): string
    {
        return $this->config['PVE_NODE_NAME'];
    }
    public function getPveCertificateValidation(): bool
    {
        return $this->config['PVE_CERTIFICATE_VALIDATION'];
    }
    public function getHAApiToken(): string
    {
        return $this->config['HA_API_TOKEN'];
    }
    public function getHAUri(): string
    {
        return $this->config['HA_URI'];
    }
}