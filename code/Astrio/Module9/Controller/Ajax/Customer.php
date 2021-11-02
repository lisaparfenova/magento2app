<?php
namespace Astrio\Module9\Controller\Ajax;
/**
* Class Customer
* @package Astrio\Module9\Controller\Ajax
*/
class Customer extends \Magento\Framework\App\Action\Action
{
    protected $_objectManager;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->_objectManager = $objectManager;
        return parent::__construct($context);
    }

    public function execute()
    {
        $customerSession = $this->_objectManager->create('Magento\Customer\Model\Session');
        
        $resultJson = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);
        $resultJson->setData(['name' => $customerSession->getCustomer()->getName(),
                              'email' => $customerSession->getCustomer()->getEmail()]);
        return $resultJson;
    }
}
