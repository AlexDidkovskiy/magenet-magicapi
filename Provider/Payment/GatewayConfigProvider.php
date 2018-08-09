<?php

namespace MageNet\MagicApi\Provider\Payment;

use Magento\Framework\App\Config\ScopeConfigInterface;

class GatewayConfigProvider implements GatewayConfigProviderInterface
{
    /** @var ScopeConfigInterface */
    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /** {@inheritdoc} */
    public function isEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::IS_ENABLED_XML_PATH);
    }
}
