<?php

namespace MageNet\MagicApi\DataProvider\Form;

use Magento\Ui\DataProvider\AbstractDataProvider;

use MageNet\MagicApi\Api\Model\BillingAddressInterface;
use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;
use MageNet\MagicApi\Model\ResourceModel\PaymentTransaction\Collection;
use MageNet\MagicApi\Model\ResourceModel\PaymentTransaction\CollectionFactory;


class PaymentTransactionDataProvider extends AbstractDataProvider
{
    /** @var Collection */
    protected $collection;

    /**
     * @param string            $name
     * @param string            $primaryFieldName
     * @param string            $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array             $meta
     * @param array             $data
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

    /** {@inheritdoc} */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        if (count($items) === 0) {
            return [];
        }

        /** @var PaymentTransactionInterface $item */
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }

        return $this->loadedData;
    }
}
