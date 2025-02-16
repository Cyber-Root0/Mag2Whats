<?php

namespace CRT0\Mag2Whats\Helper\Gateway;
use CRT0\Mag2Whats\Api\Data\GatewayInterface;
use CRT0\Mag2Whats\Helper\Config;
class Twilio  extends Config implements GatewayInterface
{
    protected $configPrefix = "gateway";    
    /**
     * getConfig
     *
     * @return array
     */
    public function getConfig(): array
    {
        return [
            'sid' => $this->getData("twilio_sid"),
            'token' => $this->getData("twilio_token")
        ];
    }
}