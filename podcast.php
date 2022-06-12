<?php include_once "header.php" ?>
<?php include_once "backend/pdo/podcast_pdo.php";  ?>
<?php
$pdo = get_connection_2();
list($podcast_id , $podcast_title) = get_podcast_list($pdo);
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=725, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="css/main.css">
        <title>PODCAST | ASHISH JAIN</title>
        <style>
            audio::-webkit-media-controls-panel
            {
                background-color: aqua;
            }
            audio::-webkit-media-controls-mute-button
            {
                background-color: red;
                border-radius: 1.5em 1.5em;
            }
            audio::-webkit-media-controls-play-button
            {
                background-color: green;
                border-radius: 1.5em 1.5em;
            }
            audio::-webkit-media-controls-timeline
            {
                background:white;
                border-radius:1.5em 1.5em;
            }
        </style>
    </head>
    <body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="text-center mt-12">
        <label for="audio_clip"></label>
        <select name="audio_clip" id="audio_clip" class="rounded-xl w-64 h-10">
            <?php for($i = 0 ; $i < count($podcast_id) ; $i++):  ?>
            <option value="<?php echo($podcast_id[$i]) ?>" class="text-center bg-indigo-200"><?php echo($podcast_title[$i]);?></option>
            <?php endfor;  ?>
        </select>
<button type="submit" name="" class="font-bold border-4 border-solid rounded-md border-gray-700 hover:bg-gray-700 hover:border-gray-100 hover:text-gray-100 px-2">FETCH</button>
    </form>


        <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['audio_clip']))  : ?>
        <?php $content = get_selected_podcast($pdo , $_POST['audio_clip']) ?>
        <div class="mt-4">
            <h3 class="float-right relative right-32 mb-6 inline-block font-bold border-2 border-solid border-gray-900 text-gray-500 bg-green-400 rounded-xl py-2 px-4""><?php echo($content['podcast_title']); ?></h3>
    <audio controls class="w-screen px-24 text-center clear-right">
        <source src="PodcastAudio/<?php echo($content['podcast_audio']);?>.mp3" type="audio/mpeg">
        Your Browser Doesn't Support Audio
    </audio>
            <h4 class="relative left-32 mt-6 font-bold inline-block border-2 border-solid border-gray-900 text-gray-100 bg-blue-500 rounded-xl py-2 px-4"><?php echo("POSTED ON: "); $date = date_create($content['podcast_date']); echo(date_format($date , 'jS F Y')); ?></h4>
        </div>
    <?php else :   ?>
    <h3 class="text-center mt-10 bg-slate-600 block text-xl">No Audio Selected, Please Choose From Dropdown Menu</h3>
    <?php endif;  ?>
    
    </body>
    </html>

<?php include_once "footer.php" ?>