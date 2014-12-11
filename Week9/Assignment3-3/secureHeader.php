<?php
if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn']==false)
{
    
    echo 'You are not currently logged in! Please log into your account to access this page';
   // header('location: index.php');
}


