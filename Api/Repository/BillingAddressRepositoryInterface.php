<?php

namespace MageNet\MagicApi\Api\Repository;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Data\SearchResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;

use MageNet\MagicApi\Api\Model\BillingAddressInterface;

interface BillingAddressRepositoryInterface
{
    /**
     * @param int $id
     * @return BillingAddressInterface
     * @throws NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param BillingAddressInterface $billingAddress
     * @return BillingAddressInterface
     * @throws CouldNotSaveException
     */
    public function save(BillingAddressInterface $billingAddress);

    /**
     * @param BillingAddressInterface $billingAddress
     * @return BillingAddressRepositoryInterface
     * @throws CouldNotDeleteException
     */
    public function delete(BillingAddressInterface $billingAddress);

    /**
     * @param int $id
     * @return BillingAddressRepositoryInterface
     */
    public function deleteById($id);
}
