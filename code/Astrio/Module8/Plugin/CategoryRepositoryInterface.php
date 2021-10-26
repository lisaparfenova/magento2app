<?php

namespace Astrio\Module8\Plugin;

use Magento\Catalog\Api\CategoryRepositoryInterface as MagentoRepositoryInterface;
use Magento\Catalog\Api\Data\CategoryInterface;
use Astrio\Module8\Api\CountriesHelpInterface;

class CategoryRepositoryInterface
{
	/**
     * @var \Astrio\Module8\Api\CountriesHelpInterface
     */
	private $countriesHelp;
	
	/**
     * @param \Astrio\Module8\Api\CountriesHelpInterface $countriesHelp
     */
	public function __construct(
		CountriesHelpInterface $countriesHelp
	) {
		$this->countriesHelp = $countriesHelp;
	}

    public function afterGet(MagentoRepositoryInterface $subject, CategoryInterface $category): CategoryInterface
    {
		if($category->getExtensionAttributes() && $category->getExtensionAttributes()->getCountries())
		{
			return $category;
		}
		$countries = $this->countriesHelp->getByCategoryId($category->getId());
		$extensionAttributes = $category->getExtensionAttributes()->setCountries($countries);
		$category->setExtensionAttributes($extensionAttributes);
    	return $category;
	}
}
