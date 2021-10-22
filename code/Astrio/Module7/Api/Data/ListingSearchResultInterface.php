<?php
namespace Astrio\Module7\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface ListingSearchResultInterface
 * @package Astrio\Module7\Api\Data
 */
interface ListingSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Astrio\Module7\Api\Data\ListingInterface[]
     */
    public function getItems();

    /**
     * @param \Astrio\Module7\Api\Data\ListingInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
