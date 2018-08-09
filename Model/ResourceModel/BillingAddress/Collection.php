<?php

namespace MageNet\MagicApi\Model\ResourceModel\BillingAddress;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;;

use MageNet\MagicApi\Model\BillingAddress as Model;
use MageNet\MagicApi\Model\ResourceModel\BillingAddress as ResourceModel;

class Collection extends AbstractCollection
{
    /** {@inheritdoc} */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
