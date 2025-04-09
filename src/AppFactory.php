<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;

class AppFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): App {
        /** @var ConfigProvider $config */
        $config = $container->get(ConfigProvider::class);
        return new App(
            $container->get(Proxmox::class),
            $container->get(BatteryStatus::class),
            $config->getMode(),
            $config->getBatteryThreshold(),
            $config->getPveNodeName()
        );
    }
}