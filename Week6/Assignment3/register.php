<?php
require 'database.php';
//create an error var
$err = '';
//take in filtered post values from the signup form. 
$email = filter_input(INPUT_POST, 'email');
$pass = filter_input(INPUT_POST, 'pass');

//make sure email field is populated

if(empty($email))
{
    $err .= '<p>Email is a required field!</p>';
}

//check for a valid email
elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false) 
{
    $err .= '<p>This is not a valid Email Address!</p>';
}
//check for password length req
if (strlen($pass) < 4)
{
    $err .= '<p>Password does not meet the minimum length requirement. Must be greater than 3 characters!</p>';
}
//make sure password field is populated
elseif(empty($pass))
{    
    $err .= '<p>Password is a required field!</p>';
}
//if there are no errors...
if (empty($err))
{
    
    //build the parameterized query.
    $query = $db->prepare('insert into signup set email=:email, password=:password');
    //then bind the parameters. 
    $query->bindParam(':email', $email, PDO::PARAM_INT);
    $query->bindParam(':password', $pass, PDO::PARAM_INT);
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
    include 'signup.html';
}


