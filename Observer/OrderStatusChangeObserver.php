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
namespace CRT0\Mag2Whats\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use CRT0\Mag2Whats\Service\MessageManager;
class OrderStatusChangeObserver implements ObserverInterface
{
    public function __construct(
        protected MessageManager $messageManager
    )
    {
    }
    public function execute(Observer $observer): void
    {
        $order = $observer->getEvent()->getOrder();
        if($this->statusUpdated($order)){
            $this->messageManager->execute($order);
        }
    }
    private function statusUpdated($order): bool
    {
        if ($order->getOrigData('status') !== $order->getData('status')){
            return true;
        }
        return false;
    }
}