<?php

namespace MageNet\MagicApi\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

use MageNet\MagicApi\Api\Model\BillingAddressInterface;
use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;
use MageNet\MagicApi\Api\Schema\PaymentTransactionSchemaInterface as SchemaInterface;
use MageNet\MagicApi\Model\ResourceModel\PaymentTransaction as ResourceModel;

/** @TODO Add validators */
class PaymentTransaction extends AbstractModel implements PaymentTransactionInterface, IdentityInterface
{
    /** {@inheritdoc} */
    public function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /** {@inheritdoc} */
    public function getIdentities()
    {
        return [sprintf("%s_%d",self::CACHE_TAG, (int)$this->getId())];
    }

    /** {@inheritdoc} */
    public function setTransactionId($transactionId)
    {
        $this->setData(SchemaInterface::TRANSACTION_ID_COLUMN_NAME, (int) $transactionId);

        return $this;
    }

    /** {@inheritdoc} */
    public function getTransactionId()
    {
        return (int) $this->getData(SchemaInterface::TRANSACTION_ID_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setTotalAmount($totalAmount)
    {
        $this->setData(SchemaInterface::TOTAL_AMOUNT_COLUMN_NAME, (float)$totalAmount);

        return $this;
    }

    /** {@inheritdoc} */
    public function getTotalAmount()
    {
        return (float) $this->getData(SchemaInterface::TOTAL_AMOUNT_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setCurrencyCode($currencyCode)
    {
        $this->setData(SchemaInterface::CURRENCY_CODE_COLUMN_NAME, $currencyCode);

        return $this;
    }

    /** {@inheritdoc} */
    public function getCurrencyCode()
    {
        return $this->getData(SchemaInterface::CURRENCY_CODE_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setBillingAddress(BillingAddressInterface $billingAddress)
    {
        $this->setData(SchemaInterface::BILLING_ADDRESS_COLUMN_NAME, $billingAddress);

        return $this;
    }

    /** {@inheritdoc} */
    public function getBillingAddress()
    {
        return $this->getData(SchemaInterface::BILLING_ADDRESS_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->setData(SchemaInterface::CREATED_AT_COLUMN_NAME, $createdAt);

        return $this;
    }

    /** {@inheritdoc} */
    public function getCreatedAt()
    {
        return $this->getData(SchemaInterface::CREATED_AT_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setUpdatedAt(\DateTimeInterface $updatedAt)
    {
        $this->setData(SchemaInterface::UPDATED_AT_CILUMN_NAME, $updatedAt);

        return $this;
    }

    /** {@inheritdoc} */
    public function getUpdatedAt()
    {
        return $this->getData(SchemaInterface::UPDATED_AT_CILUMN_NAME);
    }
}
