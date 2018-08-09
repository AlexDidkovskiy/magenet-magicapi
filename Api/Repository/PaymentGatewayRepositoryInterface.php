<?php

namespace MageNet\MagicApi\Api\Repository;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Data\SearchResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;

use MageNet\MagicApi\Api\Model\PaymentTransactionInterface;

interface PaymentGatewayRepositoryInterface
{
    /**
     * @param int $id
     * @return PaymentTransactionInterface
     * @throws NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param PaymentTransactionInterface $paymentTransaction
     * @return PaymentTransactionInterface
     * @throws CouldNotSaveException
     */
    public function save(PaymentTransactionInterface $paymentTransaction);

    /**
     * @param PaymentTransactionInterface $paymentTransaction
     * @return PaymentGatewayRepositoryInterface
     * @throws CouldNotDeleteException
     */
    public function delete(PaymentTransactionInterface $paymentTransaction);

    /**
     * @param int $id
     * @return PaymentGatewayRepositoryInterface
     */
    public function deleteById($id);
}
