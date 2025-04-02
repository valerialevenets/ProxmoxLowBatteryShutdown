<?php
namespace Valerialevenets94\ProxmoxLowBatteryShutdown;
use Laminas\ServiceManager\ServiceManager;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Config\ConfigProvider;

require_once __DIR__ . '/vendor/autoload.php';

$sm = new ServiceManager(include __DIR__ . '/config/app.config.php');
//var_dump($sm->has(ConfigProvider::class)); die;

$app = $sm->get(App::class);
//$app = new App(
//    [],
//    new Valerialevenets94\ProxmoxLowBatteryShutdown\Proxmox\Proxmox(
//        (new \Corsinvest\ProxmoxVE\Api\PveClient('pve.router.local'))
//        ->setApiToken('shutdown@pam!bea2ccaa-6e0b-41ec-a729-e5ab84e1eece=a84e60ae-8a46-4bfd-a38c-5ba9e1ae6d7b')
//        ->setValidateCertificate(false)
//    ),
//    new Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\BatteryStatus(
//        new \Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\HomeAssistant(
//            'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJlZTBiNDMwZDc4YjQ0MTNjOTMwODNmZDdlZDA1ODI0YSIsImlhdCI6MTc0MzUxMjQ0OSwiZXhwIjoyMDU4ODcyNDQ5fQ.kvd3-_718XEdjPJve05yS5iRFT612YL4HqGAfDg_LBU'
//        )
//    )
//);

$app->run();