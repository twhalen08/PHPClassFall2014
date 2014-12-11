<?php
class validators {

public function validateLogin($email, $pass)
{
    require 'database.php';
    //hash the passowrd
    $hashedPass = sha1($pass);
    // echo $hashedPass;
    //build the parameterized query.
    $query = $db->prepare('select * from signup where email=:email and password=:password');
    //then bind the parameters. 
    $query->bindParam(':email', $email, PDO::PARAM_INT);
    $query->bindParam(':password', $hashedPass, PDO::PARAM_INT);
    //if the query executes and there is a row count,
    if($query->execute() && $query->rowCount() > 0)
    {
        //the query executed successfully
        return TRUE;
    }
    else 
    {
        return FALSE;
    }
}

public function emailExists($email)
{
    require 'database.php';
    //build the parameterized query.
    $query = $db->prepare('select * from signup where email=:email');
    //then bind the parameters. 
    $query->bindParam(':email', $email, PDO::PARAM_INT);
    //if the query executes and there is a row count,
    if($query->execute() && $query->rowCount() > 0)
    {
        return TRUE;
    }
    else 
    {
        return FALSE;
    }
}

public function emailIsValid($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) 
    {
        return FALSE;
    }
    elseif (empty($email)) {
        return  FALSE;
    }
    else
    {
        return TRUE;
    }
}

public function passwordIsValid($pass)
{
    if (strlen($pass) < 4)
{
    return FALSE;
}
//make sure password field is populated
elseif(empty($pass))
{
    return FALSE;
} else {
return TRUE;    
}
}

}

