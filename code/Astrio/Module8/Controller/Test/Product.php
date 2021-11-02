<?php

namespace Astrio\Module8\Controller\Test;

class Product extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    /**
     * @var \Magento\Catalog\Model\ProductRepository
     */
    protected $productRepository;
    /**
     * @var \Magento\Framework\Api\SearchCriteriaInterface
     */
    protected $searchCriteria;
    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $filterBuilder;
    /**
     * @var \Magento\Framework\Api\SortOrderBuilde
     */
    protected $sortOrderBuilder;
    /**
     * @var \Magento\Framework\Api\Search\FilterGroupBuilder
     */
    protected $filterGroupBuilder;

    /**
     * @param \Magento\Catalog\Model\ProductRepository $productRepository
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
     * @param \Magento\Framework\Api\Search\FilterGroupBuilder $filterGroupBuilder
     */
    public function __construct(
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder,
        \Magento\Framework\Api\Search\FilterGroupBuilder $filterGroupBuilder

    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteria = $searchCriteria;
        $this->filterBuilder = $filterBuilder;
        $this->_pageFactory = $pageFactory;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;
        return parent::__construct($context);
    }

    public function getProductData()
    {
        $filterGroupFirst = $this->filterGroupBuilder->addFilter($this->filterBuilder
                ->setField('sku')
                ->setConditionType('like')
                ->setValue('WSH%')
                ->create())
            ->create();
        $filterGroupSecond = $this->filterGroupBuilder->addFilter($this->filterBuilder
                ->setField('price')
                ->setConditionType('lt')
                ->setValue('30')
                ->create())
            ->create();

        $sortOrder = $this->sortOrderBuilder->setField('name')->setDirection('DESC')->create();
        $this->searchCriteria
            ->setFilterGroups([$filterGroupFirst, $filterGroupSecond])
            ->setSortOrders([$sortOrder])
            ->setPageSize(6);
        $products = $this->productRepository->getList($this->searchCriteria);
        return $products->getItems();
    }
    public function execute()
    {
        $products = $this->getProductData();
        return $this->_pageFactory->create();
    }
}
