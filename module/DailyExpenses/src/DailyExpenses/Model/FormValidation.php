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
      if (!empty($form['key'])){
        if (!preg_match('/^[0-9]+$/',$form['key']))
          $errors = ucfirst($form['name']).' must be an integer.';
      }
      else if(!empty($form['required']))
        $errors = 'You must enter a ' . $form['name'] . '';
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
          if(!preg_match('/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/', $form['key']))
              $errors = 'The date is not in valid format.';
          else
            $piece = explode('-', $form['key']);
        }
        else if(!empty($form['required']))
            $errors = 'You must enter a ' . $form['name'] . '.';

        if(!empty($errors))
          return $errors;
        else
          return true;
    }


}