<?php

namespace MageNet\MagicApi\Normalizer;

use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;

interface PaymentTransactionNormalizerInterface
{
    public function normalize(PaymentTransactionInterface $paymentTransaction);
}
