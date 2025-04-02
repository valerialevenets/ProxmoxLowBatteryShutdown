<?php

namespace Valerialevenets94\ProxmoxLowBatteryShutdown\Battery\Adapter;

use Laminas\Http\Client;

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
        $client = new Client();

        //todo uri should be configured with config file
        $client->setUri("http://{$this->uri}/api/states/sensor.bluetti_total_battery_percent");
        $client->setMethod('GET');
        $client->setHeaders([
            'Authorization' => implode(' ', ['Bearer', $this->token])
        ]);

        $client->send()->getBody();
        $response = $client->getResponse();

        return json_decode($response->getBody(), true)['state'];
    }
}