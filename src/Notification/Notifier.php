<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Notification;

class Notifier
{
    public function __construct(
        private readonly AbstractNotification $notification
    ){}

    public function notify(): void
    {
        $this->notification->notify();
    }
}