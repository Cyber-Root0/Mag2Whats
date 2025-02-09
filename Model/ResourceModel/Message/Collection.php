<?php

namespace CRT0\Mag2Whats\Model\ResourceModel\Message;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use CRT0\Mag2Whats\Model\Message as Model;
use CRT0\Mag2Whats\Model\ResourceModel\Message as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
