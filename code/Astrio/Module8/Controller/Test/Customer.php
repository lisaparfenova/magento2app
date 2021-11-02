<?php

namespace Astrio\Module8\Controller\Test;

class Customer extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    /**
     * @var \Magento\Customer\Model\ResourceModel\CustomerRepository
     */
    protected $customerRepository;
    /**
     * @var \Magento\Framework\Api\SearchCriteriaInterface
     */
    protected $searchCriteria;
    /**
     * @var \Magento\Framework\Api\Search\FilterGroup
     */
    protected $filterGroup;
    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $filterBuilder;

    /**
     * @param \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     */
    public function __construct(
        \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Api\Search\FilterGroup $filterGroup,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->customerRepository = $customerRepository;
        $this->searchCriteria = $searchCriteria;
        $this->filterGroup = $filterGroup;
        $this->filterBuilder = $filterBuilder;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function getCustomerData()
    {
        $this->filterGroup->setFilters([
            $this->filterBuilder
                ->setField('firstname')
                ->setConditionType('eq')
                ->setValue('lisa')
                ->create(),
            $this->filterBuilder
                ->setField('email')
                ->setConditionType('like')
                ->setValue('test%')
                ->create(),
        ]);
        $this->searchCriteria->setFilterGroups([$this->filterGroup]);
        $customer = $this->customerRepository->getList($this->searchCriteria);
        $test = get_class($customer);
        return $customer->getItems();
    }

    public function execute()
    {
        $a = $this->getCustomerData();
        return $this->_pageFactory->create();
    }
}
