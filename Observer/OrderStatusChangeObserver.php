<?php

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