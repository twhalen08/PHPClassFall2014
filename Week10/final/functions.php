<?php
function emailIsValid($email)
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