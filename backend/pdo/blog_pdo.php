<?php

function get_connection()
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

function get_blogs_list($PDO)
{

    $blog_id = array();
    $blog_title = array();
    $statement = $PDO->query("SELECT blog_id , blog_title FROM blog");
    while ($row = $statement->fetch())
    {
        array_push($blog_id, $row['blog_id']);
        array_push($blog_title, $row['blog_title']);
    }
    return array($blog_id , $blog_title);
}

function get_selected_blog($PDO , $num)
{
    $sql = "SELECT * FROM blog WHERE blog_id = :num";
    $statement = $PDO->prepare($sql);
    $statement->execute([":num" => $num]);
    $post = $statement->fetch();


    return $post;
}

function set_new_record($pdo,$blog_number , $blog_title , $blog_content , $blog_img)
{
    $sql = "INSERT INTO blog (blog_id , blog_title , blog_content , blog_img) VALUES (:number , :title , :content , :img)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["number" => $blog_number , "title" => $blog_title , "content" => $blog_content , "img" => $blog_img]);
    $post = $statement->fetch();
    return $post;
}


function set_delete_selected($pdo , $num)
{
    $sql = "DELETE FROM blog WHERE blog_id = :num";
    $statement = $pdo->prepare($sql);
    $statement->execute(["num"=>$num]);
    $del = $statement->fetch();
    return $del;
}


?>

<?php
/*

$pdo = get_connection();
list($blog_id , $blog_title) = get_blogs_list($pdo);

if (empty($blog_id))
{
    echo("No Data Available");
}
else
{
    print_r($blog_id);
    print_r($blog_title);
}
echo("<br>");
$post = get_selected_blog($pdo , 1);
echo($post['blog_title']);
echo($post['blog_content']);
echo($post['blog_date']);

*/
?>
