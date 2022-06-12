<?php
$authentication = null;
$authentication2 = null;
require "data_func.php";
$authentication = auth_one();
if ($authentication == true)
{
    $authentication2 = auth_two();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=725, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title> <?php if ($authentication == false or $authentication2 == false)
        {
            echo "Not Authorized!";
        }else{echo "DASHBOARD | DATABASE"; } ?></title>
</head>
<body>

<?php   if ($authentication == true and $authentication2 == true):   ?>

<?php include_once "../welcome/welcome.php"; ?>

<?php else:  ?>

<h1>Sorry You are not authorized to go beyond this.</h1>

<?php endif;  ?>



</body>
</html>
