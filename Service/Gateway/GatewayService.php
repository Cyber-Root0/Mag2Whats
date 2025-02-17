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
use CRT0\Mag2Whats\Service\Gateway\GatewayServiceFactory;
use Magento\Framework\HTTP\Client\CurlFactory;
class GatewayService
{
    public function __construct(
        protected GatewayServiceFactory $gatewayServiceFactory,
        protected CurlFactory $curlFactory
    )
    {    
    }    
    /**
     * execute
     *
     * @param string $number
     * @param string $msg
     * @param string $gatewayCode
     * @return bool
     */
    public function execute(string $number, string $msg, string $gatewayCode): bool
    {
        $gateway = $this->gatewayServiceFactory->create($gatewayCode);
        $curl = $this->curlFactory->create();
        return $gateway->sendMessage($curl, $number, $msg);
    }
}