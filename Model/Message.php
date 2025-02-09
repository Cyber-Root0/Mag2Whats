<?php

namespace CRT0\Mag2Whats\Model;

use CRT0\Mag2Whats\Api\Data\MessageInterface;
use Magento\Framework\Model\AbstractModel;

class Message extends AbstractModel implements MessageInterface
{
    protected function _construct()
    {
        $this->_init(\CRT0\Mag2Whats\Model\ResourceModel\Message::class);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getMessageText()
    {
        return $this->getData(self::MESSAGE_TEXT);
    }

    public function setMessageText($messageText)
    {
        return $this->setData(self::MESSAGE_TEXT, $messageText);
    }

    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }
}
