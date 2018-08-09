<?php

namespace MageNet\MagicApi\Model\ResourceModel\PaymentTransaction;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;;

use MageNet\MagicApi\Model\PaymentTransaction as Model;
use MageNet\MagicApi\Model\ResourceModel\PaymentTransaction as ResourceModel;

class Collection extends AbstractCollection
{
    /** {@inheritdoc} */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
