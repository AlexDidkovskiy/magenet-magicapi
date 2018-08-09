<?php

namespace MageNet\MagicApi\Api\Provider;

interface SystemConfigProviderInterface
{
    /**
     * return true if module enabled
     *
     * @return bool
     */
    public function isEnabled();
}
