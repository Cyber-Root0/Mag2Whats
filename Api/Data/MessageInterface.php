<?php
namespace CRT0\Mag2Whats\Api\Data;
interface MessageInterface
{
    const MESSAGE_TEXT = 'message';
    const IS_ACTIVE = 'is_active';
    const STATUS = "status";    
    public function getMessageText() : string;    
    /**
     * setMessageText
     *
     * @param  string $messageText
     * @return MessageInterface
     */
    public function setMessageText(string $messageText) : MessageInterface;    
    /**
     * getIsActive
     *
     * @return bool
     */
    public function getIsActive() : bool;    
    /**
     * setIsActive
     *
     * @param bool $isActive
     * @return MessageInterface
     */
    public function setIsActive(bool $isActive) : MessageInterface;    
    /**
     * getStatus
     *
     * @return string
     */
    public function getStatus() : string ;    
    /**
     * setStatus
     *
     * @param  string $status
     * @return MessageInterface
     */
    public function setStatus(string $status) : MessageInterface;
}
