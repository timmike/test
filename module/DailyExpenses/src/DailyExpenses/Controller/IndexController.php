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
    protected $_daily;

    public function getDailyExpenseTypeTable()
	{
		if(!$this->_dailyExpenseTable){
			$sm = $this->getServiceLocator();
			$this->_dailyExpenseTable = $sm->get('DailyExpenses\Model\DailyExpensesTypeTable');
		}
		return $this->_dailyExpenseTable;
    }

    public function getDailyExpenseTable()
    {
        if(!$this->_daily){
            $sm = $this->getServiceLocator();
            $this->_daily = $sm->get('DailyExpenses\Model\DailyExpensesTable');
        }
        return $this->_daily;
    }

    public function indexAction()
    {
      return new ViewModel(array(
      	'dailyexpensesType' => $this->getDailyExpenseTypeTable()->fetchAll(),
      ));
    }

	public function getStickyNotesTable()
    {
        if (!$this->_stickyNotesTable) {
            $sm = $this->getServiceLocator();
            $this->_stickyNotesTable = $sm->get('StickyNotes\Model\StickyNotesTable');
        }
        return $this->_stickyNotesTable;
    }

    public function addAction()
    {
        $data = $this->getRequest()->getPost();
        $res = array();
        $res['price'] = $data['price'];
        $res['note'] = $data['note'];
        $res['dailexpensetypeID'] = $data['typeID'];
        $this->getDailyExpenseTable()->insertData($res);


    }
}
