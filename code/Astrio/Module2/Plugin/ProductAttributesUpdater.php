<?php

namespace Astrio\Module2\Plugin;

class ProductAttributesUpdater
{
	private $scopeConfig;
   
	public function __construct( \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig){
		$this->scopeConfig = $scopeConfig;
    }

    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
    	$enable = $this->scopeConfig->getValue('test/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    	if($enable == 1){
    		$cont = $this->scopeConfig->getValue('test/general/display_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    		return $result+$cont;
    	}else{
    		return $result;
    	}
    }
}