<?php
require 'database.php';
require 'validationFunctions.php';
//create an error var
$err = '';
//take in filtered post values from the signup form. 
$email = filter_input(INPUT_POST, 'email');
$pass = filter_input(INPUT_POST, 'pass');

//make sure email field is populated
if(emailIsValid($email)==false)
{
$err .= '<p>Email is missing or invalid! Please enter a valid email address!</p>';
}
elseif(emailExists($email) == true)
{
    $err .= '<p>This email is already associated with an account. Please use a different email!</p>';
}
if(passwordIsValid($pass)== false)
{
    $err .= '<p>Password is missing or invalid. Please enter a password that is greater than 3 characters in length.</p>';
}
//if there are no errors...
if (empty($err))
{
    //hash the passowrd
    $hashedPass = sha1($pass);
    
    //build the parameterized query.
    $query = $db->prepare('insert into signup set email=:email, password=:password');
    //then bind the parameters. 
    $query->bindParam(':email', $email, PDO::PARAM_INT);
    $query->bindParam(':password', $hashedPass, PDO::PARAM_INT);
    //if the query executes and there is a row count,
    if($query->execute() && $query->rowCount() > 0)
    {
        //the query executed successfully
        echo 'User Added!';
    }
    else 
    {
        //otherwise the query did not run
        echo 'user was not added...';
    }
    
}
//if there ARE errors...
else
{
    //echo all errors.
    echo $err;
    //include form
    include 'signup-form.php';
}



