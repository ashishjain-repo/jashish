<?php
include_once "../pdo/email_pdo.php";

$pdo = get_connection_email();
?>
<a href="../../login.php">GO BACK</a>

<?php
if(!empty($_POST['email_delete']))
{
    $del = set_delete_selected_email($pdo , $_POST['email_delete']);
    echo("EMAIL DELETED");
}

else{
    echo("Nothing To Show");
}
?>
