<?php
require('database.php');
$uid = $_POST['userID'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$zip = $_POST['zip'];

  require_once('database.php');
$query = "UPDATE users SET fullname = $fullname, email = $email, phone = $phone, zip = $zip WHERE id = $uid";
$db->exec($query);

echo $uid;
echo $fullname;
echo "Done";