<?php

namespace Astrio\Module7\Model\ResourceModel\Listing;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'list_id';
    protected $_eventPrefix = 'astrio_module7_listing_collection';
    protected $_eventObject = 'listing_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Astrio\Module7\Model\Listing::class, \Astrio\Module7\Model\ResourceModel\Listing::class);
    }
}
