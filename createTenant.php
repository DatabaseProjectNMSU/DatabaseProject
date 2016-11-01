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
    <h1>Sign-in to Tenant Account</h1>
    <p>Please enter your information.</p>

    <html>
    <body>

    <form action="tenant/TenantCreateAccount.php" method="post">
        First Name: <input type="text" name="fname"><br>
        Last Name: <input type="text" name="lname"><br>
        AccountID: <input type="text" name="accId"><br>
        E-mail: <input type="text" name="email"><br>
        Birth Day: <input type="text" name="day"><br>
        Birth Month: <input type="text" name="month"><br>
        Birth Year: <input type="text" name="year"><br>

        <input type="submit">
    </form>

    </body>
    </html>
</div>



</body>
</html>
