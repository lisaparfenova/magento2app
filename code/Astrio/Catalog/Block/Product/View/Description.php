<?php

namespace Astrio\Catalog\Block\Product\View;

class Description extends \Magento\Catalog\Block\Product\View\Description
{
    public function _beforeToHtml()
    {
        $this->_coreRegistry->registry('product')->_data['description'] = 'Test third block';
    	$this->_product = $this->_coreRegistry->registry('product');
    	return parent::_beforeToHtml();
	}
}
