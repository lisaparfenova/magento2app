<?php

namespace Astrio\Module5\Controller\Question;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class FormPost extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_objectManager;
    /**
     * @param Context $context
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\ObjectManagerInterface $objectManager
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_objectManager = $objectManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $dataPersistor = $this->_objectManager->get(\Magento\Framework\App\Request\DataPersistorInterface::class);
        $customerSession = $this->_objectManager->create('Magento\Customer\Model\Session');
        //$dataPersistor->clear('content');
        if($customerSession->isLoggedIn()) { // +++++++++++++
            //store id
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
            //post
            $data = $this->getRequest()->getParams();
            //save
            $model = $this->_objectManager->create('Astrio\Module5\Model\Question');
            $model->setData('content', $data['content']);
            $model->setData('name', $customerSession->getCustomer()->getName());
            $model->setData('store_id', $storeManager->getStore()->getStoreId());
            $model->save();
            $dataPersistor->clear('content');
        } else {
            $dataPersistor->set('content', $this->getRequest()->getParams());
        }
        return $this->resultRedirectFactory->create()->setPath('module5/question/form');
    }
}
