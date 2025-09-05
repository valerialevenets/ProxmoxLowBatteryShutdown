<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Notification;

abstract class AbstractNotification
{
    abstract public function notify();
    protected function getNotificationText(): string
    {
        return implode(PHP_EOL, [
            '⚠️Low Battery Notification⚠️',
            'Your proxmox node will be shut down due to low battery'
        ]);
    }
}