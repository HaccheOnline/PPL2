<?php
/**
 * @category Taopix
 * @package Integration
 */
namespace Taopix\Integration\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface{
 public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context){
 if (version_compare($context->getVersion(), '2.0.1') < 0) {
 $setup->startSetup();
 $setup->getConnection()->addColumn(
 $setup->getTable('quote-item'),
 'taopix_batchref',
 ['type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
 'length' => '120',
 'nullable' => false,
 'default' => 'NULL',
 'comment' => 'Taopix Batch Reference']);
 $setup->endSetup();
 } } }

 ?>