<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=725, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>LOGIN DATABASE |ASHISH JAIN</title>

    <style>
        form
        {
            width: 70%;
            margin: 15% auto;
        }
    </style>
</head>
<body>

<form action="backend/migration/data.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">USERNAME</label>
            <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_name" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="pass_word" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>