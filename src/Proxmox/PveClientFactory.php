<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox;

use Corsinvest\ProxmoxVE\Api\PveClient;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;

class PveClientFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): PveClient
    {
        /** @var ConfigProvider $config */
        $config = $container->get(ConfigProvider::class);
        return (new PveClient($config->getPveUri()))
            ->setApiToken($config->getPveApiToken())
            ->setValidateCertificate($config->getPveCertificateValidation());
    }
}