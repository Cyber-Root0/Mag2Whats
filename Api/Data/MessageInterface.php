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
