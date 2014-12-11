<?php
session_start();
if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn']==false)
{
    echo '<div>Toms User Management</div>
<div><a href="index.php">Home</a> - <a href="login-form.php">Login</a> - <a href="signup-form.php">Register</a></div>';
}
 else 
{
     echo '<div>Toms User Management</div>
<div><a href="index.php">Home</a> - <a href="admin.php">Admin</a> - <a href="logout.php">Logout</a></div>';
}

?>




