<?php include_once "../migration/data_func.php"; ?>
<?php include_once "../pdo/blog_pdo.php"; ?>
<?php include_once "../pdo/podcast_pdo.php" ?>
<?php include_once "../pdo/email_pdo.php" ?>
<?php
$pdo = get_connection();
list($blog_id , $blog_title) = get_blogs_list($pdo);
list($podcast_id , $podcast_title) = get_podcast_list($pdo);
list($email_count , $email_username , $email_date) = get_email_list($pdo);
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=725, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <style>
#main
{
    width: 100%;
    text-align: center;
    margin-top: .2em;
}
        form
        {
            width: 50%;
            margin: 20px auto;
        }
        label
        {
            position: relative;
            left:-9em;
            bottom: -2em;
        }
        #form-div
        {
            padding: 5em 10em;
        }
        #h33{
            text-align: center;
        }

    </style>
</head>
<body>
<form action="../../index.php" method="post">
<button style="float: right">LOGOUT</button>
<?php logout(); ?>
</form>
<br>
<h1 id="main">WELCOME!</h1>
<span class="d-flex justify-content-center"><?php welcome_name(); ?></span>

<form action="done_email.php" method="post">
    <table class="table">
        <tr>
            <th>EMAIL NO.</th>
            <th>EMAIL USERNAME</th>
            <th>EMAIL DATE</th>
            <th>DELETE BUTTON</th>
        </tr>
        <?php for($i = 0; $i < count($email_count); $i++): ?>
            <tr>
                <td><?php echo($email_count[$i]); ?></td>
                <td><?php echo($email_username[$i]); ?></td>
                <td><?php echo($email_date[$i]); ?></td>
                <td><button type="submit" value="<?php echo($email_count[$i]); ?>" name="email_delete">DELETE</button></td>
            </tr>
        <?php endfor;  ?>
    </table>
</form>


<form action="done.php" method="post">
    <div class="border border-dark" id="form-div">
        <h3 id="h33">BLOG DATA INPUT</h3>
    <label>BLOG NUMBER:</label><input name="num" type="number" class="form-control" required>
    <label>BLOG TITLE:</label><input type="text" name="title" class="form-control" required>
    <label>BLOG CONTENT:</label><textarea name="content" id="" cols="30" rows="10" class="form-control" required></textarea>
    <label>BLOG IMG LINK:</label><input name="link" type="text" class="form-control" required>
        <button type="submit" name="blog_post" value="on">POST</button>
    </div>
</form>
<form action="done.php" method="post">
<table class="table">
    <tr>
        <th>BLOG NO.</th>
        <th>BLOG TITLE</th>
        <th>DELETE BUTTON</th>
    </tr>
    <?php for($i = 0; $i < count($blog_id); $i++): ?>
    <tr>
    <td><?php echo($blog_id[$i]); ?></td>
    <td><?php echo($blog_title[$i]); ?></td>
    <td><button type="submit" value="<?php echo($blog_id[$i]); ?>" name="blog_delete">DELETE</button></td>
    </tr>
    <?php endfor;  ?>
</table>
</form>
<form action="done_podcast.php" method="post">
    <div class="border border-dark" id="form-div">
        <h3 id="h33">PODCAST DATA INPUT</h3>
    <label>PODCAST NUMBER:</label><input type="number" class="form-control" name="podcast_id">
    <label>PODCAST TITLE:</label><textarea name="podcast_title" id="" cols="30" rows="2" class="form-control"></textarea>
    <label>PODCAST AUDIO:</label><input type="text" class="form-control" name="podcast_link">
    <button type="submit" name="podcast_post" value="on">POST</button>
    </div>
</form>
<form action="done_podcast.php" method="post">
    <table class="table">
        <tr>
            <th>BLOG NO.</th>
            <th>BLOG TITLE</th>
            <th>DELETE BUTTON</th>
        </tr>
        <?php for($i = 0; $i < count($podcast_id); $i++): ?>
            <tr>
                <td><?php echo($podcast_id[$i]); ?></td>
                <td><?php echo($podcast_title[$i]); ?></td>
                <td><button type="submit" value="<?php echo($podcast_id[$i]); ?>" name="podcast_delete">DELETE</button></td>
            </tr>
        <?php endfor;  ?>
    </table>
</form>

</body>
</html>
