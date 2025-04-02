<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Config;

use Laminas\ServiceManager\Factory\FactoryInterface;
use M1\Env\Parser;
use Psr\Container\ContainerInterface;

class ConfigProviderFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): ConfigProvider {
        $env = new Parser(file_get_contents(__DIR__ . '/../../.env'));
        return new ConfigProvider($env->getContent());
    }
}