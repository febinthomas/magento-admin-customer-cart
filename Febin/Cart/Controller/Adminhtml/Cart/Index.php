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

class Index extends \Magento\Backend\App\Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Febin_Cart::Cart');
        $resultPage->addBreadcrumb(__('Cart'), __('Cart'));
        $resultPage->addBreadcrumb(__('Manage Cart'), __('Manage Cart'));
        $resultPage->getConfig()->getTitle()->prepend(__('Febin Cart'));

        return $resultPage;
    }

    /**
     * Is the user allowed to view the article grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Febin_Cart::Cart');
    }


}