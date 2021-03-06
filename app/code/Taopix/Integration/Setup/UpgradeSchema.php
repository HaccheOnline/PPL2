<?php
/**
 * @category Taopix
 * @package Taopix_Integration
 */
namespace Taopix\Integration\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface{
 public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context){
if(version_compare($context->getVersion(), '1.1.0', '<')) {
 $setup->startSetup();
 $setup->getConnection()
 ->addColumn(
    $setup->getTable('quote_item'),
    'taopix_batchref',
    ['type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    'length' => '50',
    'nullable' => false,
    'comment' => 'taopix batch reference']);
$setup->getConnection()
 ->addColumn(
    $setup->getTable('quote_item'),
    'taopix_projectname',
    ['type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    'length' => '255',
    'nullable' => false,
    'comment' => 'taopix project name']);
 $setup->endSetup();
 } } }

 ?>