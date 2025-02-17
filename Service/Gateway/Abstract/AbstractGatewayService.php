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
namespace CRT0\Mag2Whats\Service\Gateway\Abstract;
use CRT0\Mag2Whats\Api\Data\GatewayDataInterface;
use CRT0\Mag2Whats\Api\Data\GatewayInterface;
use Magento\Framework\HTTP\Client\Curl;
abstract class AbstractGatewayService implements GatewayInterface
{
    public function __construct(
        protected GatewayDataInterface $gatewayData)
    {
    }
    abstract function sendMessage(Curl $client, string $number, string $message): bool;
    public function getData(string $configName) : string
    {
        return $this->gatewayData->getConfig()[$configName];
    }
}