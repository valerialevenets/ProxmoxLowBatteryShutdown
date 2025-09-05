<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Notification\Factory;

use Laminas\Http\Client;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Notification\TelegramNotification;

class TelegramNotificationFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): mixed {
        /** @var ConfigProvider $config */
        $config = $container->get(ConfigProvider::class);
        return new TelegramNotification(
            new Client(),
            $config->getTelegramBotToken(),
            $config->getTelegramChatId()
        );
    }
}