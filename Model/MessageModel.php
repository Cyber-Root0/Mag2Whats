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
namespace CRT0\Mag2Whats\Model;
use CRT0\Mag2Whats\Model\ResourceModel\Message as ResourceMessage;
use CRT0\Mag2Whats\Api\Data\MessageInterface;
use Magento\Framework\Model\AbstractModel;

class MessageModel extends AbstractModel implements MessageInterface
{
    protected function _construct()
    {
        $this->_init(ResourceMessage::class);
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
