<?php

namespace CRT0\Mag2Whats\Model;
use CRT0\Mag2Whats\Model\ResourceModel\Message as ResourceMessage;
use CRT0\Mag2Whats\Api\Data\MessageInterface;
use Magento\Framework\Model\AbstractModel;

class Message extends AbstractModel implements MessageInterface
{
    protected function _construct()
    {
        $this->_init(ResourceMessage::class);
    }

    public function getId() : int
    {
        return (int) $this->getData(self::ID);
    }

    public function getMessageText(): string
    {
        return $this->getData(self::MESSAGE_TEXT);
    }

    public function setMessageText(string $messageText): MessageInterface
    {
        $this->setData(self::MESSAGE_TEXT, $messageText);
        return $this;
    }

    public function getIsActive(): bool
    {
        return (bool) $this->getData(self::IS_ACTIVE);
    }
    
    /**
     * setIsActive
     *
     * @param  mixed $isActive
     * @return MessageInterface
     */
    public function setIsActive(bool $isActive): MessageInterface
    {
        $this->setData(self::IS_ACTIVE, $isActive);
        return $this;
    }    
    /**
     * getStatus
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->getData(self::STATUS);
    }    
    /**
     * setStatus
     *
     * @param string $status
     * @return MessageInterface
     */
    public function setStatus(string $status): MessageInterface
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }
}
