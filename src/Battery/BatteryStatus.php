<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Battery;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\AdapterInterface;

class BatteryStatus
{
    public function __construct(private readonly AdapterInterface $adapter)
    {}

    public function getChargeLevel(): int
    {
        return $this->adapter->getBatteryLevel();
    }
    public function isDischarging(): bool
    {
        return $this->adapter->isDischarging();
    }
}