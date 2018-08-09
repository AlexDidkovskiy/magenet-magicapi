<?php

namespace MageNet\MagicApi\Api\Model;

interface BillingAddressInterface
{
    const CACHE_TAG = 'magenet_magicapi_model_billing_address';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param string $name
     * @return BillingAddressInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $address
     * @return BillingAddressInterface
     */
    public function setAddress($address);

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string $city
     * @return BillingAddressInterface
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $state
     * @return BillingAddressInterface
     */
    public function setState($state);

    /**
     * @return string
     */
    public function getState();

    /**
     * @param string $zipCode
     * @return BillingAddressInterface
     */
    public function setZipCode($zipCode);

    /**
     * @return string
     */
    public function getZipCode();

    /**
     * @param string $country
     * @return BillingAddressInterface
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $email
     * @return BillingAddressInterface
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $phone
     * @return BillingAddressInterface
     */
    public function setPhone($phone);

    /**
     * @return string
     */
    public function getPhone();
}
