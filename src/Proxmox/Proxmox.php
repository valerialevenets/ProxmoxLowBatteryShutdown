<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox;

class Proxmox
{
    public function __construct(private readonly ProxmoxNodeStatusProvider $nodeStatusProvider){}

    public function shutdownNode(string $node): void //TODO change return type in the future or throw exception if something wrong
    {
        $this->nodeStatusProvider->getNodeStatus($node)->nodeCmd('shutdown');
    }
}