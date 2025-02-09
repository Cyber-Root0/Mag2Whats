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
namespace CRT0\Mag2Whats\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
class Notifications extends AbstractDb
{
    public function __construct(
        Context $context
    ){
        parent::__construct($context);
    }
    protected function _construct(): void
	{
		$this->_init('mag2whats_notification', 'id');
	}
}
