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
namespace CRT0\Mag2Whats\Helper\Gateway;
use CRT0\Mag2Whats\Api\Data\GatewayDataInterface;
use CRT0\Mag2Whats\Helper\Config;
class Twilio  extends Config implements GatewayDataInterface
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
            'token' => $this->encryptor->decrypt($this->getData("twilio_token"))
        ];
    }
}
