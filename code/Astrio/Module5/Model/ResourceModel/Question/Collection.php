<?php

namespace Astrio\Module5\Model\ResourceModel\Question;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'question_id';
    protected $_eventPrefix = 'astrio_module5_question_collection';
    protected $_eventObject = 'question_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Astrio\Module5\Model\Question::class, \Astrio\Module5\Model\ResourceModel\Question::class);
    }
}
