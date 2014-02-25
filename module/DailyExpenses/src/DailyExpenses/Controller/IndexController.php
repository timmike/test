<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace DailyExpenses\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	  protected $_dailyExpenseTable;
		public function getDailyExpenseTable()
		{
			  $sm = $this->getServiceLocator();
				$this->_dailyExpenseTable = $sm->get('DailyExpenses\Model\DailyExpensesTable');
								echo 'asdfasdfasdf';
				var_dump($this->_dailyExpenseTable);
		}
    public function indexAction()
    {
    		$res = $this->getDailyExpenseTable();

        return new ViewModel();
    }
		
		public function getStickyNotesTable() {
        if (!$this->_stickyNotesTable) {
            $sm = $this->getServiceLocator();
            $this->_stickyNotesTable = $sm->get('StickyNotes\Model\StickyNotesTable');
        }
        return $this->_stickyNotesTable;
    }
}
