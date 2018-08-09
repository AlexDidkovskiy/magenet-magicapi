<?php

namespace MageNet\MagicApi\Controller\Adminhtml;

use Psr\Log\LoggerInterface;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;

use MageNet\MagicApi\Api\Repository\PaymentGatewayRepositoryInterface;
use MageNet\MagicApi\Api\Model\PaymentTransactionInterfaceFactory;
use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;

abstract class Payment extends Action
{
    const ACL_RESOURCE          = 'MageNet_MagicApi::all';
    const MENU_ITEM             = 'MageNet_MagicApi::all';
    const PAGE_TITLE            = 'MageNet MagicApi';
    const BREADCRUMB_TITLE      = 'MageNet MagicApi';

    /** @var PageFactory  */
    protected $pageFactory;

    /** @var Page */
    protected $resultPage;

    /** @var PaymentGatewayRepositoryInterface */
    protected $repository;

    /** @var  PaymentTransactionInterfaceFactory */
    protected $modelFactory;

    /** @var PaymentTransactionInterface */
    protected $model;

    /** @var Logger */
    protected $logger;

    /**
     * @param Context                               $context
     * @param Registry                              $registry
     * @param PaymentGatewayRepositoryInterface     $paymentGatewayRepository
     * @param PaymentTransactionInterfaceFactory    $paymentGatewayRepository
     * @param LoggerInterface                       $logger
     */
    public function __construct(
        Context $context,
        Registry $registry,
        PaymentGatewayRepositoryInterface $paymentGatewayRepository,
        PaymentTransactionInterfaceFactory $paymentTransactionFactory,
        LoggerInterface $logger
    ){
        $this->repository     = $paymentGatewayRepository;
        $this->modelFactory   = $paymentTransactionFactory;
        $this->logger         = $logger;

        parent::__construct($context);
    }

    /** {@inheritdoc} */
    public function execute()
    {
        $this->_setPageData();

        return $this->resultPage;
    }

    /** {@inheritdoc} */
    protected function _isAllowed()
    {
        $result = parent::_isAllowed();
        $result = $result && $this->_authorization->isAllowed(static::ACL_RESOURCE);

        return $result;
    }

    /**
     * @return Page
     */
    protected function _getResultPage()
    {
        if (null === $this->resultPage) {
            $this->resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        }

        return $this->resultPage;
    }

    /**
     * @return Payment
     */
    protected function _setPageData()
    {
        $resultPage = $this->_getResultPage();
        $resultPage->setActiveMenu(static::MENU_ITEM);
        $resultPage->getConfig()->getTitle()->prepend((__(static::PAGE_TITLE)));
        $resultPage->addBreadcrumb(__(static::BREADCRUMB_TITLE), __(static::BREADCRUMB_TITLE));
        $resultPage->addBreadcrumb(__(static::BREADCRUMB_TITLE), __(static::BREADCRUMB_TITLE));

        return $this;
    }

    /** @return PaymentTransactionInterface */
    protected function getModel()
    {
        if (null === $this->model) {
            $this->model = $this->modelFactory->create();
        }

        return $this->model;
    }

    /**
     * @return ResultInterface
     */
    protected function doRefererRedirect()
    {
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $redirect->setUrl($this->_redirect->getRefererUrl());

        return $redirect;
    }

    /**
     * @return ResponseInterface
     */
    protected function redirectToGrid()
    {
        return $this->_redirect('*/*/');
    }
}
