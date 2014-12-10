<?php
//require the database connection script
require('database.php');


//filter post data
$uid = filter_input(INPUT_POST, 'userID');
$fullname = filter_input(INPUT_POST, 'fullname');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$zip = filter_input(INPUT_POST, 'zip');

//Create a paramaterized query
$qry = $db->prepare('UPDATE users SET fullname=:fullname, email=:email, phone=:phone, zip=:zip WHERE id=:id');
$qry->bindParam(':id', $uid, PDO::PARAM_INT);
$qry->bindParam(':fullname', $fullname, PDO::PARAM_INT);
$qry->bindParam(':phone', $phone, PDO::PARAM_INT);
$qry->bindParam(':email', $email, PDO::PARAM_INT);
$qry->bindParam(':zip', $zip, PDO::PARAM_INT);


// if the query executes and returns at least one row...
 if ( $qry->execute() && $qry->rowCount() > 0 ) {
     //send the user back to the user list. 
     header('Location: viewUsers.php');
 } else {
     //warn the user of the failure and give them the chance to retry
      echo 'User Update Failed Please <a href="viewUsers.php">try again</a>';

 }     
?>
