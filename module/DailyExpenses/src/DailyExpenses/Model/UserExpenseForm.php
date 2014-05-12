<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 4/30/14
 * Time: 4:06 PM
 */
namespace DailyExpenses\Model;

use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class UserExpenseForm extends Form
{
  public function __construct($name = null)
  {
    $name = new Element('Name');
    $name->setLabel('Name');
    $name->setAttributes(array(
      'type'  => 'text'
    ));
    $name->setOptions(array(
      'required' => true,
      'label' => 'Name'
    ));

    $price = new Element('Price');
    $price->setLabel('Price');
    $price->setAttributes(array(
      'type'  => 'text'
    ));
    $price->setOptions(array(
      'required' => true,
      'label' => 'Price'
    ));

    $note = new Element('Note');
      $note->setLabel('Note');
      $note->setAttributes(array(
          'type'  => 'text',
      ));
      $note->setOptions(array(
          'required' => false,
          'label' => 'Note'
      ));

    $type_id = new Element('type_id');
    $type_id->setAttributes(array(
        'type'  => 'hidden',
    ));
    $type_id->setOptions(array(
        'required' => true
    ));

    $date = new Element('Date');
    $date->setLabel('Date');
    $date->setAttributes(array(
      'type'  => 'text',
      'id'=>'datePicker'
    ));
    $date->setOptions(array(
      'required' => false,
      'label' => 'Date'
    ));

    $send = new Element('Send');
    $send->setValue('Submit');
    $send->setAttributes(array(
      'type'  => 'submit'
    ));

    parent::__construct("regForm");
    $this->add($name);
    $this->add($price);
    $this->add($note);
    $this->add($date);
    $this->add($type_id);
    $this->add($send);
    $nameInput = new Input('name');
    $inputFilter = new InputFilter($nameInput);
    $this->setInputFilter($inputFilter);
  }

  function getForm()
  {
    return $this;
  }

  private $_form;
}