<?php
include_once "backend/pdo/email_pdo.php";

$pdo = get_connection_email();
$auth = false;
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['email']))
{
$email_username = $_POST['email'];
$post = set_new_email($pdo , $email_username);
$auth = true;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=725, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php if($auth == true): ?>
<h1><?php echo($_POST['email']); ?>, Your email has been sent.</h1>
<h3>We will reach out to you as soon as possible.</h3>
<a href="index.php" class="border-solid border-green-700 border-2 px-2 py-1 text-gray-100 bg-green-300">BACK TO HOMEPAGE</a>
<?php else: ?>
<h1>There Is nothing to show.</h1>
<?php endif; ?>
</body>
</html>