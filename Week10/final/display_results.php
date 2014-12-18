<?php
require 'functions.php';
require 'database.php';
$email = filter_input(INPUT_POST, 'email');

$phone = filter_input(INPUT_POST, 'phone');

$heard_from = filter_input(INPUT_POST, 'heard_from');

$contact_via = filter_input(INPUT_POST, 'contact_via');

$comments = filter_input(INPUT_POST, 'comments');

$errorMsg = '';


if (emailIsValid($email)=== FALSE)
{
    $errorMsg .= "<p>EMAIL is missing or invalid. Please enter a valid email!</p>";
}
$phoneMod = preg_replace('/\D/', '', $phone);
if(strlen($phoneMod) < 7)
{
    $errorMsg .= "<p>Phone number is missing or invalid! Must be a phone number between 7 and 10 digits.</p>";
} else if(strlen($phoneMod) > 10)
{
    $errorMsg .= "<p>Phone must be between 7 and 10 digits!</p>";
}

if (strlen($phoneMod)== 7)
        {
            $phoneMod = substr($phoneMod, 0, 3)."-".substr($phoneMod, 3);
        }
        else if (strlen($phone)== 10)
        {
            $phoneMod = substr($phoneMod, 0, 3)."-".substr($phoneMod,3,3)."-".substr($phoneMod, 6);
        }
        
if ($heard_from == 'Search Engine' || $heard_from == 'Friend' || $heard_from == 'Other')
{

}
else
{
    $errorMsg .= "<p>You must select who you heard from!</p>";
    $formIsValid = false;
}

if ($contact_via == 'email' || $contact_via == 'text' || $contact_via == 'phone')
{
}
else
{
    $errorMsg .= "<p>You must select how you wish to be contacted!</p>";
}


if($errorMsg == '')
{
    //build the parameterized query.
    $query = $db->prepare('insert into account set email=:email, phone=:phone, heard=:heard, contact=:contact, comments=:comments');
    //then bind the parameters. 
    $query->bindParam(':email', $email, PDO::PARAM_INT);
    $query->bindParam(':phone', $phoneMod, PDO::PARAM_INT);
    $query->bindParam(':heard', $heard_from, PDO::PARAM_INT);
    $query->bindParam(':contact', $contact_via, PDO::PARAM_INT);
    $query->bindParam(':comments', $comments, PDO::PARAM_INT);
    //if the query executes and there is a row count,
    if($query->execute() && $query->rowCount() > 0)
    {
        //the query executed successfully
        echo 'Added to DB';
         echo '<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <title>Mailing List Results</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
       <div id="content">
            <h1>Account Information</h1>

            <label>Email Address:</label>
            <span>'. htmlspecialchars($email) . '</span><br />
            
            <label>Phone:</label>
            <span>'. htmlspecialchars($phoneMod) .'</span><br />

            <label>Heard From:</label>
            <span>'. htmlspecialchars($heard_from) .'</span><br />

            <label>Contact Via:</label>
            <span>'. htmlspecialchars($contact_via) .'</span><br /><br />

            <span>Comments:</span><br />
            <span>'. nl2br(htmlspecialchars($comments), false) .'</span><br /><br><br><br><a href="table.php">GO TO ACCOUNT LOST</a>

        </div>
    </body>
</html>';
    }
    else 
    {
        //otherwise the query did not run
        echo 'User was not added to the database. Please Try again!';
        include'index.php';
    }
} else {
    echo $errorMsg;
    include'index.php';
}





?>









