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
    <h1>New Email</h1>
    <p>Please enter your new email.</p>

    <html>
    <body>

    <form action="changeMail.php" method="POST">
        New Email: <input type="text" name="new_email" value=""><br>
        <input type="submit">
    </form>


    </body>
    </html>
</div>



</body>
</html>
