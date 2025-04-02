<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown;

use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;

class App
{
    public function __construct(
        private readonly Proxmox $proxmox,
        private readonly BatteryStatus $battery,
        private readonly int $threshold,
        private readonly string $node
    ) {}

    public function run(): void
    {
        while (true) {
            if ($this->battery->getChargeLevel() <= $this->threshold) {
                $this->proxmox->shutdownNode($this->node);
                break;
            }
            sleep(60);
        }
    }
}