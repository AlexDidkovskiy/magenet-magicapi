<?php

namespace MageNet\MagicApi\Model\Repository;

use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;
use MageNet\MagicApi\Api\Repository\PaymentGatewayRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Data\SearchResultInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class PaymentGatewayRepository implements PaymentGatewayRepositoryInterface
{

    /**
     * @param int $id
     * @return PaymentTransactionInterface
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }

    /**
     * @param PaymentTransactionInterface $paymentTransaction
     * @return PaymentTransactionInterface
     * @throws CouldNotSaveException
     */
    public function save(PaymentTransactionInterface $paymentTransaction)
    {
        // TODO: Implement save() method.
    }

    /**
     * @param PaymentTransactionInterface $paymentTransaction
     * @return PaymentGatewayRepositoryInterface
     * @throws CouldNotDeleteException
     */
    public function delete(PaymentTransactionInterface $paymentTransaction)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param int $id
     * @return PaymentGatewayRepositoryInterface
     */
    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }
}
