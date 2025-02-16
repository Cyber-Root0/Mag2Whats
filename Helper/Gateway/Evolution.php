<?php

namespace CRT0\Mag2Whats\Helper\Gateway;
use CRT0\Mag2Whats\Api\Data\GatewayInterface;
use CRT0\Mag2Whats\Helper\Config;
class Evolution  extends Config implements GatewayInterface
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
            'base_url' => $this->getData("evolution_baseurl"),
            'token' => $this->getData("evolution_token")
        ];
    }
}