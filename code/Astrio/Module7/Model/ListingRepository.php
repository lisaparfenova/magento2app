<?php
namespace Astrio\Module7\Model;

use Astrio\Module7\Api\Data\ListingInterface;
use Astrio\Module7\Api\Data\ListingSearchResultInterface;
use Astrio\Module7\Api\Data\ListingSearchResultInterfaceFactory;
use Astrio\Module7\Api\ListingRepositoryInterface;
use Astrio\Module7\Model\ResourceModel\Listing as ListingResource;
use Astrio\Module7\Model\ResourceModel\Listing\Collection as ListingCollection;
use Astrio\Module7\Model\ResourceModel\Listing\CollectionFactory as ListingCollectionFactory;
use Astrio\Module7\Model\ListingFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;

/**
 * Class PostRepository
 * @package Astrio\Module7\Model
 */
class ListingRepository implements ListingRepositoryInterface
{
    /**
     * @var array
     */
    private $registry = [];

    /**
     * @var ListingResource
     */
    private $listingResource;

    /**
     * @var ListingFactory
     */
    private $listingFactory;

    /**
     * @var ListingCollectionFactory
     */
    private $listingCollectionFactory;

    /**
     * @var ListingSearchResultInterfaceFactory
     */
    private $listingSearchResultFactory;

    /**
     * @param ListingResource $istingResource
     * @param ListingFactory $istingFactory
     * @param ListingCollectionFactory $istingCollectionFactory
     * @param ListingSearchResultInterfaceFactory $istingSearchResultFactory
     */
    public function __construct(
        ListingResource $listingResource,
        ListingFactory $listingFactory,
        ListingCollectionFactory $listingCollectionFactory,
        ListingSearchResultInterfaceFactory $listingSearchResultFactory
    ) {
        $this->listingResource = $listingResource;
        $this->listingFactory = $listingFactory;
        $this->listingCollectionFactory = $listingCollectionFactory;
        $this->listingSearchResultFactory = $listingSearchResultFactory;
    }

    /**
     * @param int $list_id
     * @return ListingInterface
     * @throws NoSuchEntityException
     */
    public function get(int $list_id)
    {
        if (!array_key_exists($list_id, $this->registry)) {
            $post = $this->listingFactory->create();
            $this->listingResource->load($post, $list_id);
            if (!$post->getListId()) {                             /////&&&&&&&&
                throw new NoSuchEntityException(__('Requested post does not exist'));
            }
            $this->registry[$list_id] = $post;
        }

        return $this->registry[$list_id];
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Astrio\Module7\Api\Data\ListingSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->listingCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }

        /** @var ListingSearchResultInterface $searchResult */
        $searchResult = $this->listingSearchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * @param \Astrio\Module7\Api\Data\ListingInterface $post
     * @return ListingInterface
     * @throws StateException
     */
    public function save(ListingInterface $post)
    {
        try {
            $this->listingResource->save($post);
            $this->registry[$post->getListId()] = $this->get($post->getListId());
        } catch (\Exception $exception) {
            throw new StateException(__('Unable to save post #%1', $post->getListId()));
        }
        return $this->registry[$post->getListId()];
    }

    /**
     * @param \Astrio\Module7\Api\Data\ListingInterface $post
     * @return bool
     * @throws StateException
     */
    public function delete(ListingInterface $post)
    {
        try {
            $this->listingResource->delete($post);
            unset($this->registry[$post->getListId()]);
        } catch (\Exception $e) {
            throw new StateException(__('Unable to remove post #%1', $post->getListId()));
        }

        return true;
    }
    /**
     * @param int $list_id
     * @return bool
     */
    public function deleteById(int $list_id)
    {
        return $this->delete($this->get($list_id));
    }
}