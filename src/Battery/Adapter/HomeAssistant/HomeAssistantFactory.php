<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\HomeAssistant;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;

class HomeAssistantFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): HomeAssistant
    {
        /** @var ConfigProvider $config */
        $config = $container->get(ConfigProvider::class);
        return new HomeAssistant($config->getHAUri(), $config->getHAApiToken());
    }
}