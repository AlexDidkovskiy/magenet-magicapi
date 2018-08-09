<?php

namespace MageNet\MagicApi\Transformer;

use MageNet\MagicApi\Api\Model\BillingAddressInterface;
use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;
use MageNet\MagicApi\Api\Repository\BillingAddressRepositoryInterface;

class PaymentTransactionTransformer implements PaymentTransactionTransformerInterface
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
    public function transform(PaymentTransactionInterface $paymentTransaction)
    {
        $createdAt = $paymentTransaction->getCreatedAt();
        if (!($createdAt instanceof \DateTimeInterface)) {
            $paymentTransaction->setCreatedAt(new \DateTimeImmutable($createdAt));
        }

        $updatedAt = $paymentTransaction->getUpdatedAt();
        if (!($updatedAt instanceof \DateTimeInterface)) {
            $paymentTransaction->setUpdatedAt(new \DateTimeImmutable($updatedAt));
        }

        $billingAddress = $paymentTransaction->getBillingAddress();
        if (!($billingAddress instanceof BillingAddressInterface)) {
            $paymentTransaction->setBillingAddress($this->billingAddressRepository->getById($billingAddress));
        }

        return $paymentTransaction;
    }
}
