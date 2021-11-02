<?php
namespace Astrio\Module8\Model;

use Astrio\Module8\Api\Data\CountriesInterface;
use Astrio\Module8\Api\CountriesHelpInterface;
use Astrio\Module8\Model\ResourceModel\Countries\CollectionFactory;
use Astrio\Module8\Model\ResourceModel\Countries;

class CountriesHelper implements CountriesHelpInterface
{
	/**
     * @var \Astrio\Module8\Model\ResourceModel\Countries
     */
	private $resourse;

	/**
     * @var \Astrio\Module8\Model\ResourceModel\Countries\CollectionFactory
     */
	private $collectionFactory;

	/**
     * @param \Astrio\Module8\Model\ResourceModel\Countries $resourse
     * @param \Astrio\Module8\Model\ResourceModel\Countries\CollectionFactory $collectionFactory
     */
	public function __construct(
		CollectionFactory $collectionFactory
	){
		$this->collectionFactory = $collectionFactory;
	}
	/**
     * @param int $categoryId
     */
	public function getByCategoryId($categoryId)
	{
		$collection = $this->collectionFactory->create()
			->addFieldToFilter('category_id', ['eq' => $categoryId])->load();
		$data = $collection->getData();
		foreach ($data as $item) {
    		$countries[$item['category_country_id']] = $item['country_id'];
		}
		return $countries;
	}
}
