<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Notification;

use Laminas\Http\Client;

class TelegramNotification extends AbstractNotification
{
    public function __construct(
        private readonly Client $httpClient,
        private readonly string $token,
        private readonly string $chatId,
    ) {
    }
    public function notify(): void
    {
        $this->httpClient->setUri(
            "https://api.telegram.org/bot{$this->token}/sendMessage"
        );
        $this->httpClient->setParameterGet([
            'chat_id' => $this->chatId,
            'text' => $this->getNotificationText()
        ]);
        $this->httpClient->send();
    }
}