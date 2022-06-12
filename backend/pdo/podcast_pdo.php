<?php

function get_connection_2()
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

function get_podcast_list($PDO)
{

    $podcast_id = array();
    $podcast_title = array();
    $statement = $PDO->query("SELECT podcast_id , podcast_title FROM podcast");
    while ($row = $statement->fetch())
    {
        array_push($podcast_id, $row['podcast_id']);
        array_push($podcast_title, $row['podcast_title']);
    }
    return array($podcast_id , $podcast_title);
}

function get_selected_podcast($PDO , $num)
{
    $sql = "SELECT * FROM podcast WHERE podcast_id = :num";
    $statement = $PDO->prepare($sql);
    $statement->execute([":num" => $num]);
    $post = $statement->fetch();


    return $post;
}

function set_new_record_podcast($pdo,$podcast_number , $podcast_title , $podcast_link)
{
    $sql = "INSERT INTO podcast (podcast_id , podcast_title , podcast_audio) VALUES (:number , :title , :link)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["number" => $podcast_number , "title" => $podcast_title , "link" => $podcast_link]);
    $post = $statement->fetch();
    return $post;
}


function set_delete_selected_podcast($pdo , $num)
{
    $sql = "DELETE FROM podcast WHERE podcast_id = :num";
    $statement = $pdo->prepare($sql);
    $statement->execute(["num"=>$num]);
    $del = $statement->fetch();
    return $del;
}

?>