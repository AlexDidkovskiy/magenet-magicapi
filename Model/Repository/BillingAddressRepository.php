<?php

namespace MageNet\MagicApi\Model\Repository;

use MageNet\MagicApi\Api\Model\BillingAddressInterface;
use MageNet\MagicApi\Api\Repository\BillingAddressRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Data\SearchResultInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class BillingAddressRepository implements BillingAddressRepositoryInterface
{

    /**
     * @param int $id
     * @return BillingAddressInterface
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
     * @param BillingAddressInterface $billingAddress
     * @return BillingAddressInterface
     * @throws CouldNotSaveException
     */
    public function save(BillingAddressInterface $billingAddress)
    {
        // TODO: Implement save() method.
    }

    /**
     * @param BillingAddressInterface $billingAddress
     * @return BillingAddressRepositoryInterface
     * @throws CouldNotDeleteException
     */
    public function delete(BillingAddressInterface $billingAddress)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param int $id
     * @return BillingAddressRepositoryInterface
     */
    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }
}
