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

class RegistrationForm extends Form
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

    $confirm_password = new Element('confirm_password');
    $confirm_password->setAttributes(array(
      'type'  => 'password',
      'class'=>'text',
    ));
    $confirm_password->setOptions(array(
      'required' => true
    ));

    $first_name = new Element('first_name');
    $first_name->setAttributes(array(
      'type'  => 'text',
      'class'=>'text',
    ));
    $first_name->setOptions(array(
      'required' => true,
    ));

    $last_name = new Element('last_name');
    $last_name->setAttributes(array(
      'type'  => 'text',
      'class'=>'text',
    ));
    $last_name->setOptions(array(
      'required' => true,
    ));

    $register = new Element('Register');
    $register->setValue('Register');
    $register->setAttributes(array(
      'type'  => 'submit',
      'class'=>'button',
    ));

    parent::__construct("registrationForm");
    $this->add($email);
    $this->add($password);
    $this->add($confirm_password);
    $this->add($first_name);
    $this->add($last_name);
    $this->add($register);
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