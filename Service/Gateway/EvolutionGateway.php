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
use CRT0\Mag2Whats\Service\Gateway\Abstract\AbstractGatewayService;
use CRT0\Mag2Whats\Api\Data\GatewayDataInterface;
use CRT0\Mag2Whats\Api\Data\GatewayInterface;
use Magento\Framework\HTTP\Client\Curl;
class EvolutionGateway extends AbstractGatewayService implements GatewayInterface
{
    public function __construct(GatewayDataInterface $gatewayData)
    {
        parent::__construct($gatewayData);
    }
    /**
     * sendMessage
     *
     * @param string $number
     * @param string $message
     * @return bool
     */
    public function sendMessage(Curl $curl, string $number, string $message): bool
    {
        $curl = $this->configCurl($curl);
        $curl->post($this->getUrl(), $this->getPostData($number, $message));
        return $this->wasSent($curl);
    }
    /**
     * getPostData
     *
     * @param string $number
     * @param string $msg
     * @return string
     */
    private function getPostData(string $number, string $msg): string
    {
        return json_encode(
            [
                "number" => "55" . $number,
                "text" => $msg,
                "textMessage" => [
                    "text" => $msg
                ]
            ]
        );
    }
    /**
     * configCurl
     *
     * @param Curl $curl
     * @return Curl
     */
    private function configCurl(Curl $curl): Curl
    {
        $token = $this->getData("token");
        $curl->addHeader("apiKey", $token);
        $curl->addHeader("Content-Type", "application/json");
        return $curl;
    }
    /**
     * getUrl
     *
     * @return string
     */
    private function getUrl(): string
    {
        $base = $this->getData("base_url");
        $instance = $this->getData("instance");
        return sprintf("%s/message/sendText/%s", $base, $instance);
    }    
    /**
     * wasSent
     *
     * @param Curl $curl
     * @return void
     */
    private function wasSent(Curl $curl): bool
    {
        try {
            $response = json_decode($curl->getBody(), true);
            if (isset($response["status"]) && $response["status"] == "PENDING") {
                return true;
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}