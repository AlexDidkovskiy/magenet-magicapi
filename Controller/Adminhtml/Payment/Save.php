<?php

namespace MageNet\MagicApi\Controller\Adminhtml\Payment;

use MageNet\MagicApi\Controller\Adminhtml\Payment;

class Save extends Payment
{
   public function execute()
   {
       $data = $this->getRequest()->getParams();

       return $this->doRefererRedirect();
   }
}
