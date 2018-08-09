<?php

namespace MageNet\MagicApi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Model\AbstractModel;

use MageNet\MagicApi\Api\Schema\PaymentTransactionSchemaInterface as SchemaInterface;
use MageNet\MagicApi\Normalizer\PaymentTransactionNormalizerInterface as Normalizer;
use MageNet\MagicApi\Transformer\PaymentTransactionTransformerInterface as Transformer;

class PaymentTransaction extends AbstractDb
{
    /** @var Normalizer */
    protected $normalizer;

    /** @var Transformer */
    protected $transformer;

    /** {@inheritdoc} */
    public function __construct(
        Context $context,
        Normalizer $normalizer,
        Transformer $transformer,
        $connectionName = null
    ) {
        $this->normalizer   = $normalizer;
        $this->transformer  = $transformer;

        parent::__construct($context, $connectionName);
    }

    /** {@inheritdoc} */
    public function _construct()
    {
        $this->_init(SchemaInterface::TABLE_NAME, SchemaInterface::ID_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function _beforeSave(AbstractModel $object)
    {
        $this->normalizer->normalize($object);

        return parent::_beforeSave($object);
    }

    /** {@inheritdoc} */
    public function _afterLoad(AbstractModel $object)
    {
        $this->transformer->transform($object);

        return parent::_afterLoad($object);
    }
}
