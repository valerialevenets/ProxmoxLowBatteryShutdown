<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox;
use Corsinvest\ProxmoxVE\Api\PveClient;

class Proxmox
{
    public function __construct(private readonly PveClient $client){}

    public function shutdownNode(string $node)
    {
        $this->client->getNodes()->get($node)->getStatus()->nodeCmd('shutdown');
    }
}