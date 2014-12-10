<?php
// Get the category name
$category_name = $_POST['addCategory'];

// Validate inputs
if (empty($category_name) ) {
    $error = "Invalid Category Name";
    include('error.php');
} else {
    // If valid, add the category to the database
    require_once('database.php');
    $query = "INSERT INTO categories
                 (categoryName)
              VALUES
                 ('$category_name')";
    $db->exec($query);

    // Display the category List page
    include('category_list.php');
}
?>