<?php

namespace CRT0\Mag2Whats\Model\ResourceModel\Message;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use CRT0\Mag2Whats\Model\MessageModel as Model;
use CRT0\Mag2Whats\Model\ResourceModel\Message as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }    
    /**
     * filterByCurrentStatus
     *
     * @param  string $status
     * @return self
     */ 
    private function filterByCurrentStatus(string $status): self
    {
        $this->addFieldToFilter('status', $status);
        return $this;
    }
    public function getByStatus(string $status): Model | false
    {
        $this->filterByCurrentStatus($status);
        if ($this->getSize() > 0){
            return $this->getFirstItem();
        }
        return false;
    }
}
