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

class Profile implements InputFilterAwareInterface
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
          'name' => 'Name',
          'required' => true,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'Regex',
              'options' => array(
                'pattern' => '/^[0-9A-Za-z\s]+$/',
                'message' => array('Please remove the special characters in the Name field.')
              ),
            ),
          ),
        ))
      );

      $inputFilter->add(
        $factory->createInput(array(
          'name' => 'Price',
          'required' => true,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'Regex',
              'options' => array(
                'pattern' => '/^([1-9][0-9]*|0)(\.[0-9]{2})?$/',
                'message' => array('Price must be numeric in the Price field.')
              ),
            ),
          ),
        ))
      );

      $inputFilter->add(
        $factory->createInput(array(
          'name' => 'Note',
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
                'message' => array('Please remove the special characters in the Note field.')
              ),
            ),
          ),
        ))
      );

      $inputFilter->add(
        $factory->createInput(array(
          'name' => 'Date',
          'required' => true,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'Regex',
              'options' => array(
                'pattern' => '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/',
                'message' => array('Please select a date from the datePicker.')
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