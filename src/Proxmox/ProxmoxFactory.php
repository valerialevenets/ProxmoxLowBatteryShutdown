<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox;
use Corsinvest\ProxmoxVE\Api\PveClient;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ProxmoxFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): Proxmox
    {
        return new Proxmox($container->get(PveClient::class));
    }
}