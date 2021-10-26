<?php
namespace Astrio\Module8\Api;

use Astrio\Module8\Api\Data\CountriesInterface;

interface CountriesHelpInterface
{
    /**
     * @param int $categoryId
     */
	public function getByCategoryId($categoryId);
}
