<?php

namespace Astrio\Module5\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_questionCollectionFactory;
	protected $_storeManager;
     /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Astrio\Module5\Model\ResourceModel\Question\CollectionFactory $questionCollectionFactory,
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager,
     * @param array $data
     */
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
        \Astrio\Module5\Model\ResourceModel\Question\CollectionFactory $questionCollectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = [])
	{
        $this->_questionCollectionFactory = $questionCollectionFactory;
        $this->_storeManager = $storeManager;
		parent::__construct($context, $data);
	}
    public function getQuestionCollection() {
        $collection = $this->_questionCollectionFactory->create();
        $store_id = $this->_storeManager->getStore()->getId();
        $collection->addFieldToFilter('store_id', $store_id);
        $collection->load();
        return $collection;
	}
    public function getFormAction()
    {
        return '/module5/question/form';
    }
}
