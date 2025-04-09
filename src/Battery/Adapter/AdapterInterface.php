<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter;

interface AdapterInterface
{
    public function getBatteryLevel(): int;
    public function isCharging(): bool;
    public function isDischarging(): bool;
}