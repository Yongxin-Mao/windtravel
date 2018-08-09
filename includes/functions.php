<?php
function required($field_name, $errors)
{
  if(empty($_POST[$field_name])){
    $errors[$field_name][]=$field_name . ' is a required field.';
  }
  return $errors;
}

function minLength($field_name, $min_length, $errors)
{
  if(strlen($_POST[$field_name]) < $min_length){
    $errors[$field_name][]="$field_name must be at least $min_length characters long.";
  }
  return $errors;
}

function passwordMatch($field_name, $compare_field, $errors)
{
  if($_POST[$field_name] != $_POST[$compare_field]){
    $errors[$field_name][]="Your " . $field_name . " can not match correctly.";
  }
  return $errors;
}
//$errors=required('first_name', $errors);
//$errors=minLength('first_name', $errors);
//$errors=required('lat_name', $errors);
//$errors=required('email', $errors);


function validateEmail($email, $field_name, $errors)
{
  if(!filter_input(INPUT_POST, $field_name, FILTER_VALIDATE_EMAIL)){
    $errors[$field_name]="Please enter a valide email address.";
  }
  return $errors;
}

function esc($string)
{
  return htmlspecialchars($string, NULL, 'UTF-8', false);
}

function esc_attr($string)
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8', false);
}