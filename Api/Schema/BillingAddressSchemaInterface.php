<?php

namespace MageNet\MagicApi\Api\Schema;

interface BillingAddressSchemaInterface
{
    const TABLE_NAME            = 'magenet_magicapi_billing_address';

    const ID_COLUMN_NAME        = 'id';
    const NAME_COLUMN_NAME      = 'name';
    const ADDRESS_COLUMN_NAME   = 'address';
    const CITY_COLUMN_NAME      = 'city';
    const STATE_COLUMN_NAME     = 'state';
    const ZIP_CODE_COLUMN_NAME  = 'zip_code';
    const COUNTRY_COLUMN_NAME   = 'country';
    const EMAIL_COLUMN_NAME     = 'email';
    const PHONE_COLUMN_NAME     = 'phone';
}
