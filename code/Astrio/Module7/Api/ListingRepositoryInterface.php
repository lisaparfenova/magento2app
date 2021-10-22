<?php
namespace Astrio\Module7\Api;

use Astrio\Module7\Api\Data\ListingInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ListingRepositoryInterface
{
    /**
     * @param int $list_id
     * @return \Astrio\Module7\Api\Data\ListingInterface
     */
    public function get(int $list_id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return Astrio\Module7\Api\Data\ListingSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param \Astrio\Module7\Api\Data\ListingInterface $post
     * @return \Astrio\Module7\Api\Data\ListingInterface
     */
    public function save(ListingInterface $post);

    /**
     * @param \Astrio\Module7\Api\Data\ListingInterface $post
     * @return bool
     */
    public function delete(ListingInterface $post);
    /**
     * @param int $list_id
     * @return bool
     */
    public function deleteById(int $list_id);

}