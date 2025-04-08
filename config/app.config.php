<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown;

use Corsinvest\ProxmoxVE\Api\PveClient;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\AdapterInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\HomeAssistant\HomeAssistant;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\HomeAssistant\HomeAssistantFactory;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatusFactory;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProviderFactory;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\ProxmoxFactory;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\ProxmoxNodeStatusProvider;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\ProxmoxNodeStatusProviderFactory;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\PveClientFactory;

return [
    'factories' => [
        App::class => AppFactory::class,
        ConfigProvider::class => ConfigProviderFactory::class,
        BatteryStatus::class => BatteryStatusFactory::class,
        Proxmox::class => ProxmoxFactory::class,
        HomeAssistant::class => HomeAssistantFactory::class,
        PveClient::class => PveClientFactory::class,
        ProxmoxNodeStatusProvider::class => ProxmoxNodeStatusProviderFactory::class
    ],
    'aliases' => [
        AdapterInterface::class => HomeAssistant::class
    ]
];