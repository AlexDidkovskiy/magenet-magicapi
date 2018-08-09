<?php

namespace MageNet\MagicApi\Provider\Payment;

use MageNet\MagicApi\Api\Provider\SystemConfigProviderInterface;

interface GatewayConfigProviderInterface extends SystemConfigProviderInterface
{
    const IS_ENABLED_XML_PATH = 'payment_gateway/general/is_enabled';
}
