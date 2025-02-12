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
use CRT0\Mag2Whats\Model\Message;
class MessageManager
{
    public function __construct(
        protected CollectionFactory $messageCollection
    ){
    }
    public function getMessageByStatus(string $status): Message | false{
        $collection = $this->messageCollection->create();
        return $collection->getByStatus($status);
    }
}
