<?php

namespace Astrio\Module7\Controller\Adminhtml\Listing;

use Magento\Framework\App\Action\HttpPostActionInterface;

class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    public const ADMIN_RESOURCE = 'Astrio_Module7::listing';

    public function execute()
    {
        $data = $this->getRequest()->getParam('id');
        $data3 = $this->getRequest()->getParam('list_id');
        $data2 = $this->getRequest()->getPostValue();

        //$model = $this->_objectManager->create('Astrio\Module7\Model\Listing');
        //$model->setData('title', $data['title']);
        //$model->save();

        return $this->resultRedirectFactory->create()->setPath('module7/listing/index');
    }
}
