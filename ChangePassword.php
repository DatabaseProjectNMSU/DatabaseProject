<?php
session_start();
$usertype = $_SESSION['Type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Barnes & Read Leasing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>New Password</h1>
    <p>Please enter your username and new password.</p>

    <html>
    <body>

    <form action="chngpwd.php" method="POST">
        User Name: <input type="text" name="user" value=""><br>
        Password: <input type="text" name="passw" value=""><br>
        <input type="submit">
    </form>

    </body>
    </html>
</div>



</body>
</html>
