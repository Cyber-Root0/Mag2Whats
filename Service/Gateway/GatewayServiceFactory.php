<?php
/**
 * Copyright (c) 2025 Bruno Alves. All rights reserved.
 *
 * This file is part of the CRT0 Mag2Whats module for Magento 2.
 *
 * @package   CRT0_Mag2Whats
 * @author    Bruno Alves <boteistem@gmail.com>
 * @license   MIT
 * @link      https://github.com/Cyber-Root0
 * @version   1.0.0
 * @since     2025
 */
namespace CRT0\Mag2Whats\Service\Gateway;
use Magento\Framework\ObjectManagerInterface;
use CRT0\Mag2Whats\Api\Data\GatewayInterface;
use CRT0\Mag2Whats\Service\Gateway\EvolutionGateway;
class GatewayServiceFactory
{
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
            'evolution.api' => EvolutionGateway::class,
            default => ''
        };
        return $this->objectManager->create($gatewayClass);
    }
}