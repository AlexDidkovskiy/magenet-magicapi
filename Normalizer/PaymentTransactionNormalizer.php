<?php

namespace MageNet\MagicApi\Normalizer;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Stdlib\DateTime;;

use MageNet\MagicApi\Api\Model\BillingAddressInterface;
use MageNet\MagicApi\Api\Schema\PaymentTransactionSchemaInterface;
use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;
use MageNet\MagicApi\Api\Repository\BillingAddressRepositoryInterface;

class PaymentTransactionNormalizer implements PaymentTransactionNormalizerInterface
{
    /** @var BillingAddressRepositoryInterface */
    private $billingAddressRepository;

    /**
     * @param BillingAddressRepositoryInterface $billingAddressRepository
     */
    public function __construct(BillingAddressRepositoryInterface $billingAddressRepository)
    {
        $this->billingAddressRepository = $billingAddressRepository;
    }

    /** {@inheritdoc} */
    public function normalize(PaymentTransactionInterface $paymentTransaction)
    {
        $createdAt = $paymentTransaction->getCreatedAt();
        if ($createdAt instanceof \DateTimeInterface) {
            $paymentTransaction->setCreatedAt($this->getDateTimeString($createdAt));
        }
        if (null == $createdAt) {
            $paymentTransaction->setCreatedAt($this->getDateTimeString(new \DateTimeImmutable()));
        }

        $updatedAt = $paymentTransaction->getUpdatedAt();
        if ($updatedAt instanceof \DateTimeImmutable) {
            $paymentTransaction->setUpdatedAt($this->getDateTimeString($updatedAt));
        }
        if (null === $updatedAt) {
            $paymentTransaction->setUpdatedAt($paymentTransaction->getCreatedAt());
        }

        $billingAddress = $paymentTransaction->getBillingAddress();
        if ($billingAddress instanceof BillingAddressInterface) {
            $paymentTransaction->setData(
                PaymentTransactionSchemaInterface::BILLING_ADDRESS_COLUMN_NAME,
                $this->checkAndSaveBillingAddress($billingAddress)
            );
        }

        return $paymentTransaction;
    }

    /**
     * @param \DateTimeInterface $dateTime
     * @return string
     */
    private function getDateTimeString(\DateTimeInterface $dateTime)
    {
        return $dateTime->format(DateTime::DATETIME_INTERNAL_FORMAT);
    }

    /**
     * @param BillingAddressInterface $billingAddress
     * @return int
     * @throws CouldNotSaveException
     */
    private function checkAndSaveBillingAddress(BillingAddressInterface $billingAddress)
    {
        if (!$billingAddress->getId()) {
            $this->billingAddressRepository->save($billingAddress);
        }

        return $billingAddress->getId();
    }
}
