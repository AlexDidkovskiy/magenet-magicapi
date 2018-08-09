<?php

namespace MageNet\MagicApi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

use MageNet\MagicApi\Api\Schema\BillingAddressSchemaInterface as SchemaInterface;

class BillingAddress extends AbstractDb
{

    /** {@inheritdoc} */
    protected function _construct()
    {
        $this->_init(SchemaInterface::TABLE_NAME, SchemaInterface::ID_COLUMN_NAME);
    }
}
