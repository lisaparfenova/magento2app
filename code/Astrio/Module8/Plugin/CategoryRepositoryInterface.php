<?php

namespace Astrio\Module8\Plugin;

use Magento\Catalog\Api\CategoryRepositoryInterface as MagentoRepositoryInterface;
use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class CategoryRepositoryInterface
{
	private $collectionFactory;

	public function __construct(CollectionFactory $collectionFactory) {
		$this->collectionFactory = $collectionFactory;
	}

    public function afterGet(MagentoRepositoryInterface $subject, CategoryInterface $category)
	{
		if($category->getExtensionAttributes() && $category->getExtensionAttributes()->getCountries())
		{
			return $category;
		}
		$countries = $this->getCountries($category->getId());
		$extensionAttributes = $category->getExtensionAttributes()->setCountries($countries);
		$category->setExtensionAttributes($extensionAttributes);
    	return $category;
	}

	public function getCountries($categoryId){
		return $this->collectionFactory->create()
            ->addFieldToFilter('entity_id', ['eq' => $categoryId])
            ->getFirstItem()->getData('countries');
	}
}