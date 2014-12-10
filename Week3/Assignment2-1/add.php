<?php
require('database.php');

// Get the user data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$zip = $_POST['zip'];

if (empty($name) || empty($phone) || empty($email) || empty($zip) ) {
    echo "No fields can be left blank! Please fill out all fields!";
    header('addUser.html');
} elseif (!is_numeric($phone) || !is_numeric($zip)) {
    echo "Both the Phone field and the Zip field MUST be numeric. Please use numbers only!";
    include('addUser.html');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO users
                 (fullname, email, phone, zip)
              VALUES
                 ('$name', '$email', '$phone]', '$zip')";
    $db->exec($query);

    // Display the Product List page
    include('viewUsers.php');
}
?>

