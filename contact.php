<!-- Rendered Header (GLOBAL)-->
<?php include_once "header.php" ?>
<!-- Rendered Header (GLOBAL)-->
<?php
require_once "backend/contact_func.php";
$filename = render_json("contact_table.json");
$account = get_contact_array_account($filename);
$username = get_contact_array_username($filename);
$icon = get_contact_array_icon($filename);
$link = get_contact_array_link($filename);
$description = get_contact_array_description($filename);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=725, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="css/main.css">
    <title>CONTACT | ASHISH JAIN</title>
</head>
<body>


<table class="border-4 mx-auto mt-24 text-center" >
    <tr class="border-2">
    <th class="border-2 border-white-900 pl-2 pr-2 font-mono tracking-widest">Platforms</th>
<!--    <th class="border-2 border-red-900">Description</th>-->
    <th colspan="2" class="border-2 border-white-900 font-mono tracking-widest">Links</th>
    </tr>
    <?php for ($i = 0 ; $i < count($account) ; $i++): ?>
    <tr class="border-4 text-center">
        <td class="border-2 border-white-900 justify-center"><img class="mx-auto" src="<?php echo($icon[$i]); ?>" title="<?php echo($account[$i]); ?>"></td>
        <td class=" pl-4 font-semibold font-serif"><?php echo(strtoupper($description[$i])); ?></td>
        <td class="pl-4 pr-4"><a class="border-2 font-bold py-2 px-2 rounded-lg hover:bg-sky-400 hover:text-white active:bg-lime-300 font-serif" href="<?php echo($link[$i]); ?>" target="_blank"><?php echo($username[$i]); ?></a></td>
    </tr>
        <?php endfor; ?>
</table>
</body>
</html>
<!-- Rendered Footer (GLOBAL)-->
<?php include_once "footer.php" ?>
<!-- Rendered Footer (GLOBAL)-->
