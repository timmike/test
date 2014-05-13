<?php
/**
 * Created by PhpStorm.
 * User: gry260
 * Date: 5/1/14
 * Time: 2:04 PM
 */
namespace DailyExpenses\Model;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;

class RegistrationFormValidators implements InputFilterAwareInterface
{
  protected $inputFilter;
  public function exchangeArray($data)
  {
    $this->profilename = (isset($data['profilename'])) ? $data['profilename'] : null;
    $this->fileupload = (isset($data['fileupload'])) ? $data['fileupload'] : null;
  }

  public function setInputFilter(InputFilterInterface $inputFilter)
  {
    throw new \Exception("Not used");
  }

  public function getInputFilter()
  {
    if (!$this->inputFilter) {
      $inputFilter = new InputFilter();
      $factory = new InputFactory();
      $inputFilter->add(
        $factory->createInput(array(
          'name' => 'email',
          'required' => true,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'EmailAddress'
            ),
          ),
        ))
      );

      $inputFilter->add(
        $factory->createInput(array(
          'name' => 'password',
          'required' => false,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'Regex',
              'options' => array(
                'pattern' => '/^[0-9A-Za-z\s]+$/',
                'message' => array('Please remove the special characters in the password field.')
              ),
            ),
          ),
        ))
      );

      $inputFilter->add(
        $factory->createInput(array(
          'name' => 'confirm_password',
          'required' => false,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'Regex',
              'options' => array(
                'pattern' => '/^[0-9A-Za-z\s]+$/',
                'message' => array('Please remove the special characters in the confirm password field.')
              ),
            ),
          ),
        ))
      );

      $inputFilter->add(
        $factory->createInput(array(
          'name' => 'first_name',
          'required' => false,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'Regex',
              'options' => array(
                'pattern' => '/^[0-9A-Za-z\s]+$/',
                'message' => array('Please remove the special characters in the first name field.')
              ),
            ),
          ),
        ))
      );

      $inputFilter->add(
        $factory->createInput(array(
          'name' => 'last_name',
          'required' => false,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'Regex',
              'options' => array(
                'pattern' => '/^[0-9A-Za-z\s]+$/',
                'message' => array('Please remove the special characters in the last name field.')
              ),
            ),
          ),
        ))
      );

      $this->inputFilter = $inputFilter;
    }

    return $this->inputFilter;
  }
}