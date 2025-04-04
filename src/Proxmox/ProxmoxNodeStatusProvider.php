<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox;

use Corsinvest\ProxmoxVE\Api\PveClient;
use Corsinvest\ProxmoxVE\Api\PVENodeNodesStatus;

class ProxmoxNodeStatusProvider
{
    public function __construct(private readonly PveClient $client){}

    public function getNodeStatus(string $nodeName): PVENodeNodesStatus
    {
        return $this->client->getNodes()->get($nodeName)->getStatus();
    }
}