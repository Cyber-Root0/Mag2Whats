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
namespace CRT0\Mag2Whats\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
class StateOptions implements ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return $this->getAll();
    }
    /**
     * get all default states from Magento2 order
     *
     * @return array
     */
    private function getAll(): array
    {
        $states = [
            [
                'value' => '',
                'label' => 'Select the state'
            ],
            [
                'value' => 'new',
                'label' => __('New')
            ],
            [
                'value' => 'processing',
                'label' => __('Processing')
            ],
            [
                'value' => 'complete',
                'label' => __('Complete')
            ],
            [
                'value' => 'closed',
                'label' => __('Closed')
            ],
            [
                'value' => 'canceled',
                'label' => __('Canceled')
            ],
            [
                'value' => 'holded',
                'label' => __('On Hold')
            ],
            [
                'value' => 'payment_review',
                'label' => __('Payment Review')
            ]
        ];
        return $states;
    }
}