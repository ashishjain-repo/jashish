<!-- Rendered Header (GLOBAL)-->
<?php include_once "header.php" ?>
<!-- Rendered Header (GLOBAL)-->
<?php
include_once "backend/pdo/blog_pdo.php";
$pdo = get_connection();
list($blog_id , $blog_title) = get_blogs_list($pdo);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=725, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="blog.css">
    <title>BLOGS | ASHISH JAIN</title>

</head>
<body class="overflow-scroll">
<h1 class="text-center mt-10 text-6xl font-serif">Welcome To My Blogs</h1>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="box-border mt-24 text-center">
    <label for="blogs_drop" class="font-black">Blogs List: </label>
    <select id="blogs_drop" name="blogs" class="rounded-xl w-64 h-10">

        <?php for ($i = 0; $i < count($blog_id); $i++): ?>
            <option value="<?php echo $blog_id[$i]; ?>" class="bg-indigo-200"><?php echo $blog_title[$i]; ?></option>
        <?php endfor; ?>
    </select>
    <button id="render_button" type="submit"
            class="ml-4 border-solid border-2 py-1 px-2 rounded-lg font-mono font-black hover:bg-blue-500 tracking-widest">SHOW
    </button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['blogs'])): ?>
    <div id="data" class="border-0 mt-10 mx-12 rounded-xl pl-2 ">
    <?php  $num = $_POST['blogs']; $content = get_selected_blog($pdo,$num); ?>
        <h1 id="blog-num" class="text-2xl text-center mt-2">(<?php echo $_POST['blogs']; ?>)<?php echo $content['blog_title']; ?></h1>

        <img src="BlogImage/<?php echo($content['blog_img']); ?>" alt="image">
        <div id="content-div" class="pb-6 ml-12 mr-24"><?php echo($content['blog_content']); ?> </div>
    <h4><?php echo("POSTED ON: "); $date = date_create($content['blog_date']); echo(date_format($date , 'jS F Y')); ?></h4>
    </div>

<?php else: ?>
    <p id="p-data" class="bg-slate-600 block text-xl text-center mt-5">No Blog Selected Right Now.</p>
<?php endif; ?>
</body>
</html>
<!-- Rendered Footer (GLOBAL)-->
<?php include_once "footer.php" ?>
<!-- Rendered Footer (GLOBAL)-->


