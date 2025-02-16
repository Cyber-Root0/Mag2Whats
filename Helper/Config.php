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
use Magento\Framework\App\Config\ScopeConfigInterface;
use CRT0\Mag2Whats\Helper\GatewayFactoryFactory;
class Config
{
    protected $configPrefix = "general";
    public const MODULE_ID = "CRT0_Mag2Whats";
    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
        protected GatewayFactoryFactory $gatewayFactory
    )
    {
    }    
    /**
     * isActiveModule
     *
     * @return bool
     */
    public function isActiveModule(): bool{
        return (bool) $this->getData("enable");
    }    
    /**
     * getCurrentGateway
     *
     * @return string
     */
    public function getCurrentGateway(): string
    {
        return $this->getData("gateway");
    }    
    /**
     * getData
     *
     * @param string $paramName
     * @return mixed
     */
    protected function getData(string $paramName){
        return $this->scopeConfig->getValue(sprintf("mag2whats/%s/%s", $this->configPrefix, $paramName));
    }    
    /**
     * getGatewayConfig
     *
     * @param string $gatewayCode
     * @return array
     */
    public function getGatewayConfig(string $gatewayCode) : array
    {
        $gateway = $this->gatewayFactory->create()->create($gatewayCode);
        return $gateway->getConfig();
    }
}