<?php

namespace Astrio\Module3\Controller\Adminhtml\Test;

use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
	const MENU_ID = 'Astrio_Module3::greetings_test';
    
    public function execute()
    {
        echo "123";
    }
}
