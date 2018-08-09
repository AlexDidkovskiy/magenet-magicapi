<?php

namespace MageNet\MagicApi\Transformer;

use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;

interface PaymentTransactionTransformerInterface
{
    /**
     * @param PaymentTransactionInterface $paymentTransaction
     * @return PaymentTransactionInterface
     */
    public function transform(PaymentTransactionInterface $paymentTransaction);
}
