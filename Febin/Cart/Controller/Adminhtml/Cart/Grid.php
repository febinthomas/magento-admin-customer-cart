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

namespace Febin\Cart\Controller\Adminhtml\Cart;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Grid extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return void
     */
    public function execute()
    {
        $result = $this->resultPageFactory->create();
        return $result;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Febin_Cart::cart');
    }
}