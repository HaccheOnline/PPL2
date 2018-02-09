<?php
namespace Taopix\Integration\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements InstallSchemaInterface
{

/**
 * {@inheritdoc}
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
public function install(SchemaSetupInterface $setup, ModuleContextInterface    $context)
  {
    $installer = $setup;

    $installer->startSetup();

    $eavTable = $installer->getTable('quote_item');

    $columns = [
        'taopix_batchref' => [
            'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            'nullable' => false,
            'comment' => 'Taopix Batch Referance',
        ],

    ];

    $connection = $installer->getConnection();
    foreach ($columns as $name => $definition) {
        $connection->addColumn($eavTable, $name, $definition);
    }

    $installer->endSetup();
}
}

 ?>