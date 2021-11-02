<?php
namespace Astrio\Module8\Api\Data;

interface CountriesInterface
{
    /**#@+
     * Constants
     * @var string
     */
    const CATEGORY_COUNTRY_ID = 'category_country_id';
    const CATEGORY_ID = 'category_id';
    const COUNTRY_ID = 'country_id';

    /**
     * @return int
     */
    public function getCategoryCountryId();

    /**
     * @param int $category_country_id
     * @return $this
     */
    public function setCategoryCountryId($category_country_id);

    /**
     * @return int
     */
    public function getCategoryId();

    /**
     * @param int $category_id
     * @return $this
     */
    public function setCategoryId($category_id);

    /**
     * @return string
     */
    public function getCountryId();

    /**
     * @param string $country_id
     * @return $this
     */
    public function setCountryId(string $country_id);
}