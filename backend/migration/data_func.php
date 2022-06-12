<?php
define("USERNAME_","ashishkjain");
define("PASSWORD_","Adinath@1008");
define("USERNAME__","admin");
define("PASSWORD__","rakeshjain");
$authentication = null;
$authentication2 = null;
$var = null;
function auth_one()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        global $authentication;
        $authentication = true;
    }
    else
    {
        global $authentication;
        $authentication = false;
    }
    return $authentication;
}


function auth_two()
{

    if($_POST['user_name'] == USERNAME_ and $_POST['pass_word'] == PASSWORD_)
    {
        global $authentication2;
        $authentication2 = true;
        global $var;
        $var = "Ashish Jain";

    }
    elseif ($_POST['user_name'] == USERNAME__ and $_POST['pass_word'] == PASSWORD__)
    {
        global $authentication2;
        $authentication2 = true;
        global $var;
        $var = "Administrator";
    }
    else
    {
        global $authentication2;
        $authentication2 = false;
    }
    return $authentication2;
}

function welcome_name()
{
    global $var;
    echo strtoupper($var);
}

function logout()
{
    $_POST['user_name'] = "000";
    $_POST['pass_word'] = "000";
}