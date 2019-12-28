<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Login</title>
    <style>
        body {
            background-color: #0C1111;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>Login</h1>
        <form action="managing.php" method="POST">
            <input class="input-information" type="text" name="aduser" placeholder="Username"> <br>
            <input class="input-information" type="password" name="adpass" placeholder="Password"> <br>
            <input class="input-information" type="submit" value="Login">
        </form>
</body>

</html>