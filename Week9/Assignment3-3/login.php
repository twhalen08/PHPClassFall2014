<?php
require 'database.php';
require 'validationFunctions.php';
session_start();
//create an error var
$err = array('');
//take in filtered post values from the signup form. 
$email = filter_input(INPUT_POST, 'email');
$pass = filter_input(INPUT_POST, 'pass');

$validators = new validators();

if($validators->emailIsValid($email)==false)
{
    array_push($err, '<p>Email is missing or invalid! Please enter a valid email address!</p>');
}
if($validators->passwordIsValid($pass)== false)
{
    array_push($err, '<p>Password is missing or invalid. Please enter a password that is greater than 3 characters in length.</p>');
}
if($validators->validateLogin($email, $pass)== false)
{
   array_push($err, '<p>Login Failed! Username or Password invalid!</p>');
}
//if there are no errors...
if (count($err) < 2)
{
$_SESSION['isLoggedIn']=true;
header('location:admin.php');
}
//if there ARE errors...
else
{
    //echo all errors.
    foreach($err as $value)
    {
        echo $value;
    }
    unset($value);
    //include form
    include 'login-form.php';
}

