<?php

namespace Astrio\Module7\Model;

use Astrio\Module7\Api\Data\ListingInterface;

class Listing extends \Magento\Framework\Model\AbstractModel implements ListingInterface
{
	const CACHE_TAG = 'astrio_module7_listing';
	protected $_cacheTag = 'astrio_module7_listing';
	protected $_eventPrefix = 'astrio_module7_listing';

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

	protected function _construct()
	{
		$this->_init('Astrio\Module7\Model\ResourceModel\Listing');
	}

    /**
     * @return int
     */
    public function getListId()
    {
        return $this->getData(ListingInterface::LIST_ID);
    }

    /**
     * @param int $list_id
     * @return $this
     */
    public function setListId($list_id)
    {
        $this->setData(ListingInterface::LIST_ID, $list_id);
        return $this;
    }

	/**
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(ListingInterface::TITLE);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->setData(ListingInterface::TITLE, $title);
        return $this;
    }
}
