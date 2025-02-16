<?php

namespace CRT0\Mag2Whats\Helper;
use Magento\Framework\ObjectManagerInterface;
use CRT0\Mag2Whats\Api\Data\GatewayInterface;
use CRT0\Mag2Whats\Helper\Gateway\Evolution;
use CRT0\Mag2Whats\Helper\Gateway\Twillio;
class GatewayFactory
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        protected ObjectManagerInterface $objectManager
    )
    {
    }    
    /**
     * create
     *
     * @param string $gatewayCode
     * @return GatewayInterface
     */
    public function create($gatewayCode): GatewayInterface
    {
        $gatewayClass = match ($gatewayCode) {
            'evolution.api' => Evolution::class,
            'twilio.gateway' => Twillio::class,
            default => ''
        };
        return $this->objectManager->create($gatewayClass);
    }
}