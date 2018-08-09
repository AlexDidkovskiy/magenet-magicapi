<?php

namespace MageNet\MagicApi\Controller\Adminhtml\Payment;

use MageNet\MagicApi\Controller\Adminhtml\Payment;

class Create extends Payment
{
    const ACL_RESOURCE          = 'MageNet_MagicApi::payment_transaction_edit';
    const MENU_ITEM             = 'MageNet_MagicApi::magenet_mageicapi';
    const PAGE_TITLE            = 'Payment Transaction Create';
    const BREADCRUMB_TITLE      = 'Payment Transaction';
}
