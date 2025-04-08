<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Config;

use Particle\Validator\Validator;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\Exception\ConfigValidationException;

class ConfigProvider
{
    public function __construct(private readonly array $config)
    {
        $validator = new Validator();
        $validator->required('BATTERY_THRESHOLD')->integer(true)->between(20, 90);
        $validator->required('PVE_URI')->string()->allowEmpty(false);
        $validator->required('PVE_API_TOKEN')->string()->allowEmpty(false);
        $validator->required('PVE_NODE_NAME')->string()->allowEmpty(false);
        $validator->required('PVE_CERTIFICATE_VALIDATION')->bool()->allowEmpty(false);

        $validator->required('HA_URI')->string()->allowEmpty(false);
        $validator->required('HA_API_TOKEN')->string()->allowEmpty(false);

        if (! empty($messages = $validator->validate($this->config)->getMessages())) {
            throw new ConfigValidationException($messages);
        }
    }

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