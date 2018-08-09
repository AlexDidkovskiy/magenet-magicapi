<?php

namespace MageNet\MagicApi\Controller\Adminhtml\Payment;

use MageNet\MagicApi\Controller\Adminhtml\Payment;

class Grid extends Payment
{
    const ACL_RESOURCE          = 'MageNet_MagicApi::payment_transaction_grid';
    const MENU_ITEM             = 'MageNet_MagicApi::payment_transaction_grid';
    const PAGE_TITLE            = 'MageNet MagicApi Payment Transaction';
    const BREADCRUMB_TITLE      = 'Payment Transaction';
}
