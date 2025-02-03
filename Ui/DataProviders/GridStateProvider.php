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
namespace CRT0\Mag2Whats\Ui\DataProviders;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Sales\Model\ResourceModel\Order\Status\CollectionFactory;
class GridStateProvider extends AbstractDataProvider
{
    protected $collection;    
    /**
     * __construct
     *
     * @param CollectionFactory $collectionFactory
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta 
     * @param array $data
     * @return void
     */
    public function __construct(
        protected CollectionFactory $collectionFactory,
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $this->collectionFactory->create();
    }    
    /**
     * getData
     *
     * @return array
     */
    public function getData(): array
    {
        $data = $this->getAllState();
        return [
            'items' => $data,
            'totalRecords' => count($data)
        ];
    }    
    /**
     * getAllState
     *
     * @return array
     */
    public function getAllState() : array
    {
        $this->collection->joinStates();
        $states = [];
        foreach ($this->collection as $status) {
            $states[] = [
                'status' => $status->getStatus(),
                'state' => $status->getState(),
                'label' => $status->getLabel()
            ];
        }
        return $states;
    }
    
}