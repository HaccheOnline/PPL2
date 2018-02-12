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
 if (version_compare($context->getVersion(), '1.0.1') < 0) {
    $setup->startSetup();
     // Get module table
    $tableName = $setup->getTable('quote_item');

    // Check if the table already exists

    if ($setup->getConnection()->isTableExists($tableName) == true) {

    // Declare data

    $columns = [

    'taopix_batchref' => [

    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,

    'nullable' => true,

    'comment' => 'Taopix Batch Reference',

    ],

    'taopix_projectname' => [

        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    
        'nullable' => true,
    
        'comment' => 'Taopix Project Name',
    
    ]

    ];

    $connection = $setup->getConnection();

    foreach ($columns as $name => $definition) {

    $connection->addColumn($tableName, $name, $definition);

    }

    
    }

    }
 
 

 $setup->endSetup();
 } }

 ?>