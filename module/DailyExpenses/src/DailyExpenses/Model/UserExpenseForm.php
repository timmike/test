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

    $price = new Element('Price');
    $price->setLabel('Price');
    $price->setAttributes(array(
      'type'  => 'text'
    ));

    $note = new Element('Note');
    $note->setLabel('Note');
    $note->setAttributes(array(
      'type'  => 'text'
    ));

    $date = new Element('Date');
    $date->setLabel('Date');
    $date->setAttributes(array(
      'type'  => 'text'
    ));

    $csrf = new Element\Csrf('security');

    $send = new Element('Send');
    $send->setValue('Submit');
    $send->setAttributes(array(
      'type'  => 'submit'
    ));

    $this->form = new Form('regForm');
    $this->form->add($name);
    $this->form->add($price);
    $this->form->add($note);
    $this->form->add($date);
    $this->form->add($csrf);
    $this->form->add($send);
  }

  function getForm()
  {
    return $this->form;
  }

  private $_form;
}