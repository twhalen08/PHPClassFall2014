<?php
// Get IDs
$category_id = $_POST['categoryID'];
$category_name = $_POST['categoryName'];

// Delete the category from the database
require_once('database.php');
$query = "DELETE FROM categories
          WHERE categoryID = '$category_id'";
$db->exec($query);

// display the category list
include('category_list.php');
?>