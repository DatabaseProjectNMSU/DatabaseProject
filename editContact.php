<!DOCTYPE html>
<?php
session_start();
?>

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
    <p>Please enter your new password.</p>

    <html>
    <body>

    <form action="chngcon.php" method="POST">
        Password: <input type="text" name="passw" value=""><br>
        <input type="submit">
    </form>
    <?php
    $_SESSION['changeType']="pw";
    ?>

    </body>
    </html>
</div>



</body>
</html>
