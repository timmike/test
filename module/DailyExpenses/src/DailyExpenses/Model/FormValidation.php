<?php
namespace DailyExpenses\Model;

class FormValidation
{
    public function __construct()
    {
    }

    public function validateDouble($form)
    {
        $errors = NULL;
        if (!empty($form['key'])){
          if (!is_numeric($form['key']))
            $errors = ucfirst($form['name']).' must be numeric.';
        }
        else if(!empty($form['required']))
            $errors = 'You must enter a ' . $form['name'] . '.';

        if(!empty($errors))
          return $errors;
        else
          return true;

    }

    public function validateInteger($form)
    {

    }

    public function validateWords($form)
    {
        if (!empty($form['key'])){
          $chars = preg_replace('/[A-Za-z0-9\-\\s]/', '', $form['key']);
          if(!empty($chars)){
              $errors = ucfirst($form['name']).' contains special characters. Please remove the
              following characters: '.$chars.'';
          }
        }
        else if(!empty($form['required']))
            $errors = 'You must enter a ' . $form['name'] . '';

        if(!empty($errors))
          return $errors;
        else
          return true;

    }

    public function validateDate($form)
    {
        if (!empty($form['key'])){
          if(!preg_match('/^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$/', $form['key']))
              $errors = 'The date is not in valid format.';
          else{
            $piece = explode('-', $form['key']);
            if(!checkdate($piece[1], $piece['2'], $piece[0]))
              $errors = 'The date you have entered does not exist.';
          }
        }
        else if(!empty($form['required']))
            $errors = 'You must enter a ' . $form['name'] . '.';

        if(!empty($errors))
          return $errors;
        else
          return true;
    }


}