<?php

namespace Astrio\Test\Observer;

class TestObserverUrl implements \Magento\Framework\Event\ObserverInterface
{
	/**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
	public function __construct( \Psr\Log\LoggerInterface $logger){
		$this->logger = $logger;
    }

	public function execute(\Magento\Framework\Event\Observer $observer)
	{
        $request=$observer->getData('request');
		$url = $request->getPathInfo();
		$this->logger->info(sprintf('Astrio Test Observer send url - %s', $url));
	}
}
