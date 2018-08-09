<?php

namespace MageNet\MagicApi\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

use MageNet\MagicApi\Api\Model\BillingAddressInterface;
use MageNet\MagicApi\Api\Schema\BillingAddressSchemaInterface as SchemaInterface;
use MageNet\MagicApi\Model\ResourceModel\PaymentTransaction as ResourceModel;

/** @TODO add velidators */
class BillingAddress extends AbstractModel implements BillingAddressInterface, IdentityInterface
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
    public function setName($name)
    {
        $this->setData(SchemaInterface::NAME_COLUMN_NAME, $name);

        return $this;
    }

   /** {@inheritdoc} */
    public function getName()
    {
        return $this->getData(SchemaInterface::NAME_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setAddress($address)
    {
        $this->setData(SchemaInterface::ADDRESS_COLUMN_NAME, $address);

        return $this;
    }

    /** {@inheritdoc} */
    public function getAddress()
    {
        return $this->getData(SchemaInterface::ADDRESS_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setCity($city)
    {
        $this->setData(SchemaInterface::CITY_COLUMN_NAME, $city);

        return $this;
    }

    /** {@inheritdoc} */
    public function getCity()
    {
        return $this->getData(SchemaInterface::CITY_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setState($state)
    {
        $this->setData(SchemaInterface::STATE_COLUMN_NAME, $state);

        return $this;
    }

    /** {@inheritdoc} */
    public function getState()
    {
        return $this->getData(SchemaInterface::STATE_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setZipCode($zipCode)
    {
        $this->setData(SchemaInterface::ZIP_CODE_COLUMN_NAME, $zipCode);

        return $this;
    }

    /** {@inheritdoc} */
    public function getZipCode()
    {
        return $this->getData(SchemaInterface::ZIP_CODE_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setCountry($country)
    {
        $this->setData(SchemaInterface::COUNTRY_COLUMN_NAME, $country);

        return $this;
    }

    /** {@inheritdoc} */
    public function getCountry()
    {
        return $this->getData(SchemaInterface::COUNTRY_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setEmail($email)
    {
        $this->setData(SchemaInterface::EMAIL_COLUMN_NAME, $email);

        return $this;
    }

    /** {@inheritdoc} */
    public function getEmail()
    {
        return $this->getData(SchemaInterface::EMAIL_COLUMN_NAME);
    }

    /** {@inheritdoc} */
    public function setPhone($phone)
    {
        $this->setData(SchemaInterface::PHONE_COLUMN_NAME, $phone);

        return $this;
    }

    /** {@inheritdoc} */
    public function getPhone()
    {
        return $this->getData(SchemaInterface::PHONE_COLUMN_NAME);
    }
}
