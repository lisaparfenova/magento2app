<?php

namespace Astrio\Module4\Block;

class First extends \Magento\Framework\View\Element\AbstractBlock
{    
    protected function _toHtml()
    {
       return 'Test first block</br>';
    }
}