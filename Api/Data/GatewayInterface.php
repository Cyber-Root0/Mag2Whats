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
namespace CRT0\Mag2Whats\Api\Data;
use Magento\Framework\HTTP\Client\Curl;
use CRT0\Mag2Whats\Api\Data\GatewayDataInterface;
interface GatewayInterface
{
    public function __construct(GatewayDataInterface $gatewayData);
    public function sendMessage(Curl $client, string $number, string $message): bool;
}