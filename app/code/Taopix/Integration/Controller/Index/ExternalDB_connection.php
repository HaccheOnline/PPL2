<?php
namespace Taopix\Integration\Controller\Index;
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
 
class Index extends Action
{
     private $connection;
 
    /**
     * @param Context                               $context
     */
    public function __construct(
        Context $context,
        \Magento\Framework\App\ResourceConnection $resourceConnection
    ) {
        $this->connection = $resourceConnection->getConnection('custom'); // "custom" is your database connection name which is given in env.php
        parent::__construct($context);
    }
 
    public function execute()
    {
        try {
            $select = $this->connection->select()->from(['page_items']); //student_info is a table in customdb, this query is to select table
            $data = $this->connection->fetchAll($select); //here fetching all rows from student_info table
            echo "<pre>";
            print_r($data); //print that data in array
        } catch (\Exception $e) {
        }
    }
}