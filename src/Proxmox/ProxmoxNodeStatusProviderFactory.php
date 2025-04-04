<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox;
use Corsinvest\ProxmoxVE\Api\PveClient;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ProxmoxNodeStatusProviderFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ): ProxmoxNodeStatusProvider {
        return new ProxmoxNodeStatusProvider($container->get(PveClient::class));
    }
}