<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=725, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="css/main.css">
    <style>
        button:active{
            border-style: inset;
        }
    </style>
</head>
<body>
<!-- This is the starting of the footer -->

<ul class="w-screen flex bg-slate-600 mt-24 h-10 items-center justify-center">
    <li class="pl-6 text-white active:text-yellow-400"><a href="index.php">Home</a></li>
    <li class="pl-6 text-white active:text-yellow-400"><a href="contact.php">Contact</a></li>
    <li class="pl-6 text-white active:text-yellow-400"><a href="other.php">Other Creation</a></li>
    <li class="pl-6 text-white active:text-yellow-400"><a href="login.php">Login</a></li>
</ul>
<ul class="w-screen flex bg-slate-600 h-10 items-center justify-center">
    <li>
        <form action="email.php" method="post">
            <label for="" class="text-xl text-white">Get In Touch: </label>
            <input type="email" placeholder="Please Leave Your Email" class="rounded-xl pl-2 font-black" name="email">
            <button type="submit" class="font-black font-serif pl-2 border-4 border-green-400 bg-white px-2 rounded-lg hover:bg-green-400 hover:text-white hover:border-white focus:bg-green-400 focus:text-white focus:border-white active:bg-blue-700" name="email_send" value="on">SEND</button>
        </form>
    </li>
</ul>

<!-- This is the end of the footer-->
</body>
</html>
