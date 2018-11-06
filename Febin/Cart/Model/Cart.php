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

namespace Febin\Cart\Model;

class Cart extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Febin\Cart\Model\ResourceModel\Cart');
    }
}
