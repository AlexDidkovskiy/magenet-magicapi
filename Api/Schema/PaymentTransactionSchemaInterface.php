<?php

namespace MageNet\MagicApi\Api\Schema;

interface PaymentTransactionSchemaInterface
{
    const TABLE_NAME = 'magenet_magicapi_payment_gateway';

    const ID_COLUMN_NAME                = 'id';
    const TRANSACTION_ID_COLUMN_NAME    = 'transaction_id';
    const TOTAL_AMOUNT_COLUMN_NAME      = 'total_amount';
    const CURRENCY_CODE_COLUMN_NAME     = 'currency_code';
    const BILLING_ADDRESS_COLUMN_NAME   = 'billing_address_id';
    const CREATED_AT_COLUMN_NAME        = 'created_at';
    const UPDATED_AT_CILUMN_NAME        = 'updated_at';
}
