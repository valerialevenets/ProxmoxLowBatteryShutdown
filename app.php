<?php
namespace Valerialevenets94\ProxmoxLowBatteryShutdown;
use Laminas\ServiceManager\ServiceManager;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;

require_once __DIR__ . '/vendor/autoload.php';

$sm = new ServiceManager(include __DIR__ . '/config/app.config.php');

$app = $sm->get(App::class);
$app->run();