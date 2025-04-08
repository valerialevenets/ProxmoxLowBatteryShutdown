<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\HomeAssistant;

use Laminas\Http\Client;
use Laminas\Http\Response;
use Particle\Validator\Validator;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\AdapterInterface;
use Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter\Exception\BatteryStatusUnavailableException;

class HomeAssistant implements AdapterInterface
{
    public function __construct(private readonly string $uri, private readonly string $token) {}

    /**
     * @return int
     * TODO add error handling
     * unauthorized
     * uri not found
     * etc
     * or just check is 200
     *
     * sometimes HA can not reach battery, should process that as well
     */
    public function getBatteryLevel(): int
    {
        return $this->getValidatedState($this->getData());
    }

    private function getValidatedState(Response $response): int
    {
        $data = json_decode($response->getBody(), true);
        $validator = new Validator();
        $validator->required('state')->integer()->between(0, 100)->allowEmpty(false);
        if (! empty($messages = $validator->validate($data)->getMessages())) {
            throw new BatteryStatusUnavailableException(['messages' => $messages, 'data' => $data]);
        }
        return $data['state'];
    }
    private function getData(): Response
    {
        $client = new Client();

        //todo uri should be configured with config file
        $client->setUri("http://{$this->uri}/api/states/sensor.bluetti_total_battery_percent");
        $client->setMethod('GET');
        $client->setHeaders([
            'Authorization' => implode(' ', ['Bearer', $this->token])
        ]);

        $client->send()->getBody();
        return $client->getResponse();
    }
}