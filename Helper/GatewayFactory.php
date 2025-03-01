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
namespace CRT0\Mag2Whats\Helper;
use Magento\Framework\Exception\NotFoundException;
use CRT0\Mag2Whats\Api\Data\GatewayDataInterface;

class GatewayFactory
{


    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        private array $availableGateways
    )
    {
    }

    /**
     * create
     *
     * @param string $gatewayCode
     * @return GatewayDataInterface
     * @throws NotFoundException
     */
    public function create($gatewayCode): GatewayDataInterface
    {
        if (!isset($this->availableGateways[$gatewayCode])) {
            throw new NotFoundException(__('Gateway code not found: %1', $gatewayCode));
        }

        return $this->availableGateways[$gatewayCode]->create();
    }
}
