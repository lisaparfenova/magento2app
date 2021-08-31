<?php

namespace Astrio\Module3\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterInterface;

class Router implements \Magento\Framework\App\RouterInterface
{
	/**
     * @var ActionFactory
     */
    private $actionFactory;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     * @param ResponseInterface $response
     */
    public function __construct(
        ActionFactory $actionFactory,
        ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->response = $response;
    }

    public function match(RequestInterface $request): ?ActionInterface
    {
        $identifier = trim($request->getPathInfo(), '/');

        if (strpos($identifier, 'lesson.html') !== false) {
            $request->setModuleName('routetest');
            $request->setControllerName('test');
            $request->setActionName('index');
            return $this->actionFactory->create(Forward::class, ['request' => $request]);
        }
        return null;
    }
}
