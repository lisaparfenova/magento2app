<?php

namespace Astrio\Module8\Model\ResourceModel\Countries;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'category_country_id';
    protected $_eventPrefix = 'astrio_module8_countries_collection';
    protected $_eventObject = 'countries_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Astrio\Module8\Model\Countries::class, \Astrio\Module8\Model\ResourceModel\Countries::class);
    }
}
