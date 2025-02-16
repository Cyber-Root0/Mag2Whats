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
namespace CRT0\Mag2Whats\Service;
use CRT0\Mag2Whats\Model\ResourceModel\Message\CollectionFactory;
use CRT0\Mag2Whats\Model\MessageModel;
use CRT0\Mag2Whats\Helper\Config;
class MessageManager
{
    public function __construct(
        protected CollectionFactory $messageCollection,
        protected Config $config
    ) {
    }
    /**
     * execute
     *
     * @param  mixed $order
     * @return void
     */
    public function execute($order): void
    {
        if ($this->canExecute($order)) {
            $number = $this->extractNumber($order);
            $messageTosend = $this->getMessage($order->getData('status'));
            $gateway = $this->config->getCurrentGateway();
            var_dump([$number, $messageTosend]);
        }
    }
    /**
     * getMessageByStatus
     *
     * @param  mixed $status
     * @return MessageModel
     */
    public function getMessageByStatus(string $status): MessageModel|false
    {
        $collection = $this->messageCollection->create();
        return $collection->getByStatus($status);
    }
    /**
     * getMessage
     *
     * @param  string $status
     * @return string
     */
    private function getMessage(string $status): string
    {
        return $this->getMessageByStatus($status)->getMessageText();
    }
    /**
     * canExecute
     *
     * @param  mixed $order
     * @return bool
     */
    private function canExecute($order): bool
    {
        if (!$this->config->isActiveModule()) {
            return false;
        }
        if (empty($this->config->getCurrentGateway())) {
            return false;
        }
        $status = $order->getData('status');
        if (!$this->hasCustomMessage($status)) {
            return false;
        }
        return true;
    }
    /**
     * valid if isset custom message and if is active
     *
     * @param string $status
     * @return bool
     */
    private function hasCustomMessage(string $status): bool
    {
        $customMessage = $this->getMessageByStatus($status);
        if (!$customMessage) {
            return false;
        }
        if ($customMessage->getIsActive()) {
            return true;
        }
        return false;
    }
    /**
     * extract phone number
     *
     * @param  mixed $order
     * @return string
     */
    private function extractNumber($order): string|false
    {
        $billingAddress = $order->getBillingAddress();
        if (!$billingAddress) {
            return false;
        }
        $phoneNumber = $billingAddress->getTelephone();
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        return !empty($phoneNumber) ? $phoneNumber : false;
    }
}
