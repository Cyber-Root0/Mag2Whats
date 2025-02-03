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
use CRT0\Mag2Whats\Model\ResourceModel\Notifications as ResourceNotifications;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
class Notifications extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'crt0_magwhats_notifications';
	protected $_cacheTag = 'crt0_magwhats_notifications';
	protected $_eventPrefix = 'crt0_magwhats_notifications';
	protected function _construct()
	{
		$this->_init(ResourceNotifications::class);
	}
	public function getIdentities(): array
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}
	public function getDefaultValues(): array
	{
		$values = [];

		return $values;
	}
}