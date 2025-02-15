<?php

namespace CRT0\Mag2Whats\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Message extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mag2whats_message', 'id');
    }
}
