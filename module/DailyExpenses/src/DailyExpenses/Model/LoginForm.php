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

class LoginForm extends Form
{
  public function __construct($name = null)
  {
    $email = new Element('email');
    $email->setAttributes(array(
      'type'  => 'text',
      'class'=>'text',
    ));
    $email->setOptions(array(
      'required' => true,
    ));

    $password = new Element('password');
    $password->setAttributes(array(
      'type'  => 'password',
      'class'=>'text'
    ));
    $password->setOptions(array(
      'required' => true,
      'placeholder' => 'Password'
    ));


    $submit = new Element('Submit');
    $submit->setValue('Submit');
    $submit->setAttributes(array(
      'type'  => 'submit',
      'class'=>'button',
    ));

    parent::__construct("loginForm");
    $this->add($email);
    $this->add($password);
    $this->add($submit);
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