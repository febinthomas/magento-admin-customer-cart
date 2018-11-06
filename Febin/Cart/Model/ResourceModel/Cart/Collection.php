<?php
/**
 *  NOTICE OF LICENSE
 *    
 *   This source file is subject to the MIT License
 *   that is bundled with this package in the file LICENSE.txt.
 *   It is also available through the world-wide-web at this URL:
 *   http://opensource.org/licenses/mit-license.php
 *   
 *  @author        Febin Thomas
 *  @copyright     Copyright (c) 2018
 *  @license       http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Febin\Cart\Model\ResourceModel\Cart;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    public function __construct(
        \Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
        \Magento\Framework\Event\ManagerInterface $eventManager,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\DB\Adapter\AdapterInterface $connection = null,
        \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null
    ) {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->storeManager = $storeManager;
    }

    protected function _construct()
    {
        $this->_init('\Febin\Cart\Model\Cart', '\Febin\Cart\Model\ResourceModel\Cart');
    }

    protected function _initSelect()
    {
        parent::_initSelect();
        $this->getSelect()->joinLeft(
            ['oi' => 'quote'],
            'main_table.entity_id = oi.customer_id',
            ['total_count' => 'oi.items_qty','quote_id'=>'oi.entity_id',"oi.is_active"]);

        $this->getSelect()->columns(
            ['items' => "(SELECT GROUP_CONCAT(oi2.name SEPARATOR ', ') FROM quote_item oi2 where oi2.quote_id = oi.entity_id AND oi.is_active = 1 )"]
        );
        $this->getSelect()->columns(
            ['qtys' => "(SELECT GROUP_CONCAT(oi3.qty SEPARATOR ', ') FROM quote_item oi3 where oi3.quote_id = oi.entity_id AND oi.is_active=1)"]
        );

        $this->addFieldToFilter(
            'oi.items_qty',
            ['neq' => '0']
        )->addFieldToFilter(
            'oi.is_active',
            '1'
        );
        $this->addFilterToMap('entity_id','main_table.entity_id');
        return $this;
    }
}
