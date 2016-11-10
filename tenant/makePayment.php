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

    <form action="paymentInfo.php" method="POST">
        Amount(in dollars): <input type="text" name="amt" value=""><br>
        <select name="method">
            <option value="credit"selected>Credit</option>
            <option value="debit">Debit</option>
            <option value="check">Check</option>
        </select>
        <br><br>
        <input type="submit">
    </form>

    </body>
    </html>
</div>



</body>
</html>

