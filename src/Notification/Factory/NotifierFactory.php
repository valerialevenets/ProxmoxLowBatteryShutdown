<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Notification\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Notification\AbstractNotification;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Notification\Notifier;

class NotifierFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, string $requestedName, ?array $options = null): mixed
    {
        return new Notifier(
            $container->get(AbstractNotification::class)
        );
    }
}