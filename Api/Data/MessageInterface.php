<?php

namespace CRT0\Mag2Whats\Api\Data;

interface MessageInterface
{
    const ID = 'id';
    const MESSAGE_TEXT = 'message_text';
    const IS_ACTIVE = 'is_active';

    public function getId();
    public function getMessageText();
    public function setMessageText($messageText);
    public function getIsActive();
    public function setIsActive($isActive);
}
