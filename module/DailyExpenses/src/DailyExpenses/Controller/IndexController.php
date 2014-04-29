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
use DailyExpenses\Model\FormValidation;

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
        if($this->getRequest()->isPost())
        {
           $data = $this->getRequest()->getPost();
           $form = new FormValidation();
           $errors = array();
           $price = array('validateDouble'=>array('name'=>'price', 'key'=>$data['price'], 'required'=>true));
           $note =  array('validateWords'=>array('name'=>'note', 'key'=>$data['note'], 'regex'=>Null, 'required'=>false));
           $date = array('validateDate'=>array('name'=>'date', 'key'=>$data['date'], 'required'=>true));
           $validating = array($price, $note, $date);

            if(!empty($validating)){
              foreach($validating as $key=> $value){
                foreach($value as $function => $fields)
                  if($form->$function($fields) !== true){
                      $errors[] = $form->$function($fields);
                  }
              }
            }


            echo '<pre>';
            print_r($errors);
            echo '</pre>';

            exit;
           $msgs = array();
           if(!empty($data['pice'])){
             if(!is_numeric($data['price'])){
               $msgs[] = ' The price for this item is not valid';
             }
           }
           else
             $msgs[] = ' You must enter a price for the item. ';



           $res = array();
           echo '<pre>';
           print_r($data);
            echo '</pre>';
            $res['price'] = $data['price'];
            $res['note'] = $data['note'];
            $res['dailexpensetypeID'] = $data['typeID'];
            $this->getDailyExpenseTable()->insertData($res);
        }


    }
}
