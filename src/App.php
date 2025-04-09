<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown;

use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ValueObject\Mode;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;

class App
{
    public function __construct(
        private readonly Proxmox $proxmox,
        private readonly BatteryStatus $battery,
        private readonly string $mode,
        private readonly int $threshold,
        private readonly string $node
    ) {}

    public function run(): void
    {
        switch ($this->mode) {
            case Mode::CRON:
                $this->runOnce();
                break;
            case Mode::STANDALONE:
                $this->runStandalone();
                break;
        }
    }
    private function runStandalone(): void
    {
        while (true) {
            $this->runOnce();
            sleep(60);
        }
    }
    private function runOnce(): void
    {
        if ($this->battery->getChargeLevel() <= $this->threshold && $this->battery->isDischarging()) {
            $this->proxmox->shutdownNode($this->node);
        }
    }
}