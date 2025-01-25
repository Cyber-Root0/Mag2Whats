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
namespace CRT0\Mag2Whats\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
class GatewayList implements ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return $this->getAll();
    }
    /**
     * get all integrated gateways and APIS
     *
     * @return array
     */
    private function getAll(): array
    {
        return [
            [
                'value' => '',
                'label' => 'Select the gateway'
            ],
            [
                'value' => 'evolution.api',
                'label' => 'Evolution API - WhatsApp API'
            ],
            [
                'value' => 'twilio.gateway',
                'label' => 'Twilio - SMS and WhatsApp Gateway'
            ]
        ];
    }
}