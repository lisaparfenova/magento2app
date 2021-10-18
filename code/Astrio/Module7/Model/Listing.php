<?php

namespace Astrio\Module7\Model;

class Listing extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
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

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];
		return $values;
	}
}
