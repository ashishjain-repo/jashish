<?php
function get_connection_email()
{

/*
* This function does not take any argument it just returns the $PDO instance which is connected to the pre-defined database.
* To use this function on other mysql database just change the hostname, database_name, username and password. Now you are good to go.
* Only the connection to the pre-defined database is defined and the way the data will be processed is associative array.
*/

// CONSTANTS FOR CONNECTION TO THE DATABASE.
define('HOSTNAME', 'localhost');
define('DATABASE_NAME', 'whole');
define('USERNAME', 'root');
define('PASSWORD', '');

// DSN formation which defines the statement for creating the pdo instance.
$DSN = "mysql:host=" . HOSTNAME . ";dbname=" . DATABASE_NAME;

// pdo instance created and passed the values.
$PDO = new PDO($DSN, USERNAME, PASSWORD);

// Defined an attribute that will fetch the associative array of data for the database.
$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// returning the pdo instance for fetching the details from the database.
return $PDO;
}


function get_email_list($PDO)
{

    $email_count = array();
    $email_username = array();
    $email_date = array();
    $statement = $PDO->query("SELECT email_count , email_username , email_date FROM email");
    while ($row = $statement->fetch()) {
        array_push($email_count, $row['email_count']);
        array_push($email_username, $row['email_username']);
        array_push($email_date, $row['email_date']);
    }
    return array($email_count, $email_username , $email_date);
}

function set_new_email($pdo, $email_username)
{
    $sql = "INSERT INTO email (email_username) VALUES (:username)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["username" => $email_username]);
    $post = $statement->fetch();
    return $post;
}

function set_delete_selected_email($pdo , $num)
{
    $sql = "DELETE FROM email WHERE email_count = :num";
    $statement = $pdo->prepare($sql);
    $statement->execute(["num"=>$num]);
    $del = $statement->fetch();
    return $del;
}




?>