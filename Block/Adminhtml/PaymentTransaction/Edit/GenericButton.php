<?php
/**
 * Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2018, Pavel Usachev
 */

namespace MageNet\MagicApi\Block\Adminhtml\PaymentTransaction\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

use MageNet\MagicApi\Api\Repository\PaymentGatewayRepositoryInterface;

class GenericButton
{
    /** @var Context */
    protected $context;

    /** @var PaymentGatewayRepositoryInterface */
    protected $repository;

    public function __construct(
        Context $context,
        PaymentGatewayRepositoryInterface $repository
    ) {
        $this->context      = $context;
        $this->repository   = $repository;
    }

    /**
     * Return Payment Transaction ID
     *
     * @return int|null
     */
    public function getItemId()
    {
        try {
            return $this->repository->getById(
                (int) $this->context->getRequest()->getParam('id')
            )->getId();
        } catch (NoSuchEntityException $e) {
        }

        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}