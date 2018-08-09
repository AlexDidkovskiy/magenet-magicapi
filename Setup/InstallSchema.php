<?php

namespace MageNet\MagicApi\Setup;

use Psr\Log\LoggerInterface;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;

use MageNet\MagicApi\Api\Schema\BillingAddressSchemaInterface;
use MageNet\MagicApi\Api\Schema\PaymentTransactionSchemaInterface;

class InstallSchema implements InstallSchemaInterface
{
    /** @var LoggerInterface */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /** {@inheritdoc} */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        try {
            $this->createBillingAddressTable($setup);
            $this->createPaymentGatewayTable($setup);
        } catch (\Exception $e) {
              $this->logger->critical($e->getMessage());
              throw $e;
        }

        $setup->endSetup();
    }

    /**
     * @param SchemaSetupInterface $setup
     * @throws \Zend_Db_Exception
     */
    private function createBillingAddressTable(SchemaSetupInterface $setup)
    {
        /** create table `magenet_maicapi_billing_address` */
        $table = $setup->getConnection()->newTable(
            $setup->getTable(BillingAddressSchemaInterface::TABLE_NAME)
        )->addColumn(
            BillingAddressSchemaInterface::ID_COLUMN_NAME,
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned'=> true],
            'Billing Address ID'
        )->addColumn(
            BillingAddressSchemaInterface::NAME_COLUMN_NAME,
            Table::TYPE_TEXT,
            64,
            ['nullable' => false],
            'Customer Name'
        )->addColumn(
            BillingAddressSchemaInterface::EMAIL_COLUMN_NAME,
            Table::TYPE_TEXT,
            64,
            ['nullable' => false],
            'Customer Email'
        )->addColumn(
            BillingAddressSchemaInterface::ADDRESS_COLUMN_NAME,
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Address'
        )->addIndex(
            $setup->getIdxName(
                $setup->getTable(BillingAddressSchemaInterface::TABLE_NAME),
                [BillingAddressSchemaInterface::NAME_COLUMN_NAME, BillingAddressSchemaInterface::EMAIL_COLUMN_NAME],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            [BillingAddressSchemaInterface::NAME_COLUMN_NAME, BillingAddressSchemaInterface::EMAIL_COLUMN_NAME],
            ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        )->setComment(
            'MageNet MagicApi Billing Address Table'
        );

        $setup->getConnection()->createTable($table);
    }

    /**
     * @param SchemaSetupInterface $setup
     * @throws \Zend_Db_Exception
     */
    private function createPaymentGatewayTable(SchemaSetupInterface $setup)
    {
        /** create table `magenet_maicapi_billing_address` */
        $table = $setup->getConnection()->newTable(
            $setup->getTable(PaymentTransactionSchemaInterface::TABLE_NAME)
        )->addColumn(
            PaymentTransactionSchemaInterface::ID_COLUMN_NAME,
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned'=> true],
            'Payment Transaction ID'
        )->addColumn(
            PaymentTransactionSchemaInterface::TRANSACTION_ID_COLUMN_NAME,
            Table::TYPE_INTEGER,
            16,
            ['nullable' => false, 'unsigned'=> true],
            'Transaction ID'
        )->addColumn(
            PaymentTransactionSchemaInterface::TOTAL_AMOUNT_COLUMN_NAME,
            Table::TYPE_DECIMAL,
            '12,4',
            ['nullable' => false],
            'Total amount'
        )->addColumn(
            PaymentTransactionSchemaInterface::CURRENCY_CODE_COLUMN_NAME,
            Table::TYPE_TEXT,
            12,
            ['nullable' => false],
            'Currency code'
        )->addColumn(
            PaymentTransactionSchemaInterface::BILLING_ADDRESS_COLUMN_NAME,
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true],
            'Billing address'
        )->addColumn(
            PaymentTransactionSchemaInterface::CREATED_AT_COLUMN_NAME,
            Table::TYPE_DATETIME,
            null,
            ['nullable' => false],
            'Created at'
        )->addColumn(
            PaymentTransactionSchemaInterface::UPDATED_AT_CILUMN_NAME,
            Table::TYPE_DATETIME,
            null,
            ['nullable' => false],
            'Updated At'
        )->setComment(
            'MageNet MagicApi Payment Transaction Table'
        );

        $setup->getConnection()->createTable($table);

        $setup->getConnection()->addForeignKey(
            $setup->getFkName(
                $setup->getTable(PaymentTransactionSchemaInterface::TABLE_NAME),
                PaymentTransactionSchemaInterface::BILLING_ADDRESS_COLUMN_NAME,
                $setup->getTable(BillingAddressSchemaInterface::TABLE_NAME),
                BillingAddressSchemaInterface::ID_COLUMN_NAME
            ),
            $setup->getTable(PaymentTransactionSchemaInterface::TABLE_NAME),
            PaymentTransactionSchemaInterface::BILLING_ADDRESS_COLUMN_NAME,
            $setup->getTable(BillingAddressSchemaInterface::TABLE_NAME),
            BillingAddressSchemaInterface::ID_COLUMN_NAME,
            Table::ACTION_NO_ACTION
        );
    }
}
