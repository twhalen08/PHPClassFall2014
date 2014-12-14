<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':
        $message = 'Enter some data and click on the Submit button.';
        break;
    case 'process_data':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        
        if(empty($name))
        {
            $message = "The field 'NAME' is missing or invalid! Please enter a name!";
            break;
            
        }
        
        $name = strtolower($name);
        $name = ucwords($name);
        $result = explode(" ", $name);
        $firstName = $result[0];
        
        if((empty($email)) || (filter_var($email, FILTER_VALIDATE_EMAIL) == false))
        {
            $message = "The field 'EMAIL' is missing or invalid. Please input a valid email address to continue!";
            break;
        }
        else
        {
            $phone = preg_replace('/\D/', '', $phone);
        }
        
        if(strlen($phone) < 7)
        {
            $message = "The phone number entered is missing or invalid! Must be at least 7 digits!";
            break;
        } elseif (strlen($phone) > 10 )
        {
            $message = "The phone number must be between 7 and 10 digits.";
        }
        
        if (strlen($phone)== 7)
        {
            $phone = substr($phone, 0, 3)."-".substr($phone, 3);        
        }
        else if (strlen($phone)== 10)
        {
            $phone = substr($phone, 0, 3)."-".substr($phone,3,3)."-".substr($phone, 6);
        }
        
        $message = "Hello: $firstName \n\nThank you for entering this data:\n\nName: $name\nEmail: $email\nPhone: $phone";
        break;
}
include 'string_tester.php';
?>