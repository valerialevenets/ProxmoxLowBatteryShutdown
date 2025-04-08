<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Exception;

class ExtendedException extends \Exception
{
    public function __construct(
        private readonly array $validationMessages,
        string $message = "",
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
    public function getValidationMessages(): array
    {
        return $this->validationMessages;
    }
}