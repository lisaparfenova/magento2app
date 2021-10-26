<?php

namespace Astrio\Module8\Model;

use Astrio\Module8\Api\Data\CountriesInterface;

class Countries extends \Magento\Framework\Model\AbstractModel implements CountriesInterface
{
	const CACHE_TAG = 'astrio_module8_countries';
	protected $_cacheTag = 'astrio_module8_countries';
	protected $_eventPrefix = 'astrio_module8_countries';

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
		$this->_init('Astrio\Module8\Model\ResourceModel\Countries');
	}

    /**
     * @return int
     */
    public function getCategoryCountryId()
    {
        return $this->getData(CountriesInterface::CATEGORY_COUNTRY_ID);
    }

    /**
     * @param int $category_country_id
     * @return $this
     */
    public function setCategoryCountryId($category_country_id)
    {
        $this->setData(CountriesInterface::CATEGORY_COUNTRY_ID, $category_country_id);
        return $this;
    }

    /**
     * @return int
     */
	public function getCategoryId()
    {
        return $this->getData(CountriesInterface::CATEGORY_ID);
    }

    /**
     * @param int $category_id
     * @return $this
     */
    public function setCategoryId($category_id)
    {
        $this->setData(CountriesInterface::CATEGORY_ID, $category_id);
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryId()
    {
        return $this->getData(CountriesInterface::COUNTRY_ID);
    }

    /**
     * @param string $country_id
     * @return $this
     */
    public function setCountryId(string $country_id)
    {
        $this->setData(CountriesInterface::COUNTRY_ID, $country_id);
        return $this;
    }
}
