<?php
require('database.php');
$uid = $_POST['userID'];
    $query = "DELETE FROM users WHERE id = $uid";
    $db->exec($query);

    // Display the Product List page
    include('viewUsers.php');
?>




