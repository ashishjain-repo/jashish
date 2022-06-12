<?php
include_once "../pdo/blog_pdo.php";

$pdo = get_connection();
?>
<a href="../../login.php">GO BACK</a>

<?php
    if(!empty($_POST['blog_delete']))
    {
        $del = set_delete_selected($pdo , $_POST['blog_delete']);
        echo("BLOG DELETED");
    }
    elseif (!empty($_POST['num']))
    {
        $id = $_POST['num'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $img = $_POST['link'];
        $post = set_new_record($pdo , $id , $title , $content , $img);
        echo("BLOG ADDED".$post);
    }
    else{
echo("Nothing To Show");
    }
    ?>
