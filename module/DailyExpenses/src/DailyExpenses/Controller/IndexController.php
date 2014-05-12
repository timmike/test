<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace DailyExpenses\Controller;

use Zend\Filter\Null;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DailyExpenses\Model\Profile;
use Zend\Session\Container;
use DailyExpenses\Model\UserExpenseForm;

class IndexController extends AbstractActionController
{
  protected $_dailyExpenseTable;
  protected $_daily;
  protected $_user;
  protected $_menus;

  public function getMenusTable()
  {
      if (!$this->_menus) {
          $sm = $this->getServiceLocator();
          $this->_menus = $sm->get('DailyExpenses\Model\MenusTable');
      }
      return $this->_menus;
  }
  public function getDailyExpenseTypeTable()
  {
    if (!$this->_dailyExpenseTable) {
      $sm = $this->getServiceLocator();
      $this->_dailyExpenseTable = $sm->get('DailyExpenses\Model\DailyExpensesTypeTable');
    }
    return $this->_dailyExpenseTable;
  }

  public function getDailyExpenseTable()
  {
    if (!$this->_daily) {
      $sm = $this->getServiceLocator();
      $this->_daily = $sm->get('DailyExpenses\Model\DailyExpensesTable');
    }
    return $this->_daily;
  }

  public function indexAction()
  {
    $userExpenseForm = new UserExpenseForm();
    $form = $userExpenseForm->getForm();
    return new ViewModel(array(
      'dailyexpensesType' => $this->getDailyExpenseTypeTable()->fetchAll(),
      'records'=>$this->getUserTable()->fetchAllRecords(),
      'form'=>$form,
      'menus'=>$this->getMenusTable()->fetchAll()
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

  public function getUserTable()
  {
    if(!$this->_user){
      $sm = $this->getServiceLocator();
      $this->_user = $sm->get('DailyExpenses\Model\UsersTable');
    }
    return $this->_user;
  }

  public function addAction()
  {
    $userExpenseForm = new UserExpenseForm();
    $request = $this->getRequest();
    if ($request->isPost()) {
      $profile = new Profile();
      $userExpenseForm->setInputFilter($profile->getInputFilter());
      $userExpenseForm->setData($request->getPost());
      if ($userExpenseForm->isValid()) {
        $data = (array)$request->getPost();
        $pieces = explode('/', $data['Date']);
        $data['Date'] = $pieces[2].'-'.$pieces[1].'-'.$pieces[0];
        $data['date_created'] = date("Y-m-d H:i:s");
        $data = array_change_key_case($data,CASE_LOWER);
        unset($data['send']);
        $this->getDailyExpenseTable()->insert($data);
        return $this->redirect()->toRoute('dailyexpense');
      }
      else{
        $messages = $userExpenseForm->getMessages();
        return $this->redirect()->toRoute('dailyexpense');
      }
    }
  }

  public function testAction()
  {
    echo 'asdf';
  }
}
