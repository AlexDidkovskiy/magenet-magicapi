<?php

namespace MageNet\MagicApi\Api\Model;

interface PaymentTransactionInterface
{
    const CACHE_TAG = 'magenet_magicapi_model_payment_transacrion';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param string $transactionId
     * @return PaymentTransactionInterface
     */
    public function setTransactionId($transactionId);

    /**
     * @return string
     */
    public function getTransactionId();

    /**
     * @param float $totalAmount
     * @return PaymentTransactionInterface
     */
    public function setTotalAmount($totalAmount);

    /**
     * @return float
     */
    public function getTotalAmount();

    /**
     * @param string $currencyCode
     * @return PaymentTransactionInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * @return string
     */
    public function getCurrencyCode();

    /**
     * @param BillingAddressInterface $billingAddress
     * @return PaymentTransactionInterface
     */
    public function setBillingAddress(BillingAddressInterface $billingAddress);

    /**
     * @return BillingAddressInterface
     */
    public function getBillingAddress();

    /**
     * @param \DateTimeInterface $createdAt
     * @return PaymentTransactionInterface
     */
    public function setCreatedAt(\DateTimeInterface $createdAt);

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt();

    /**
     * @param \DateTimeInterface $updatedAt
     * @return PaymentTransactionInterface
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt);

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedAt();
}
