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
    <h1>Create Tenant Account</h1>
    <p>Please enter your information.</p>

    <html>
    <body>

    <form action="addInfo.php" method="POST">
        UserID: <input type="text" name="userid" value=""><br>
        Password:<input type="text" name="pw" value=""><br>
        First Name: <input type="text" name="fname" value=""><br>
        Last Name: <input type="text" name="lname" value=""><br>
        E-mail: <input type="text" name="email" value=""><br>
        Birthday (YYYY-MM-DD): <input type="text" name="dob" value=""><br>

        <input type="submit">
    </form>

    </body>
    </html>
</div>



</body>
</html>