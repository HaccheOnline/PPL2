<?php
/**
 * @category Taopix
 * @package Integration
 */
namespace Taopix\Integration\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
          $installer->getConnection()->addColumn(
                $installer->getTable('quote_item'),
                'taopix_batchref',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 50,
                    'nullable' => true,
                    'comment' => 'Taopix Batch Reference'
                ]
            );
        }
        $installer->endSetup();
    }
}

 ?>