<?php

namespace Astrio\Module4\Block;

class Fifth extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function test()
	{
		return __('</br>Test fifth block');
	}
}
