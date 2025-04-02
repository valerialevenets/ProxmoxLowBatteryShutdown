<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Battery;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\AdapterInterface;

class BatteryStatusFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): BatteryStatus
    {
        return new BatteryStatus($container->get(AdapterInterface::class));
    }
}