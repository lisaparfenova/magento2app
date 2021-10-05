<?php
namespace Astrio\Module7\Model;

use	Astrio\Module7\Model\ResourceModel\Listing\CollectionFactory;

use Magento\Ui\DataProvider\Modifier\ModifierInterface;
//use Magento\Ui\DataProvider\Modifier\PoolInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $сollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        //if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
       // }
        $data2 = $this->getCollection()->toArray();
        $this->data =$data2['items'];

        return $this->data;
    }
}
