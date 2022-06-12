<?php
include_once "../pdo/podcast_pdo.php";
$pdo = get_connection_2();
?>
<a href="../../login.php">GO BACK</a>
<?php
if(!empty($_POST['podcast_delete']))
{
    $del = set_delete_selected_podcast($pdo , $_POST['podcast_delete']);
    echo("PODCAST DELETED");
}
elseif (!empty($_POST['podcast_id']))
{
    $id = $_POST['podcast_id'];
    $title = $_POST['podcast_title'];
    $link = $_POST['podcast_link'];
    $post = set_new_record_podcast($pdo , $id , $title , $link);
    echo("RECORD ADDED".$post);
}
else{
echo("Nothing To Show");
}



?>
