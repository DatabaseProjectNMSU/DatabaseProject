<!DOCTYPE html>
<html lang="en">
<?php
include('../Connection.php');
include('../Constants.php');
?>
<head>
    <title>Tenant Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Tenant Account</h1>
    <p>View your Personal info, make payments, etc...</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Tenant Info</h3>
            <p>You can access your account here</p>
            <?php
            $conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query="SELECT * FROM User WHERE UserID='$userid'";
            $result=mysql_query($query,$conn);

            echo "<table border='1'>
                <tr>
                <th>UserID</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Email</th>
                </tr>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['UserID'] . "</td>";
                echo "<td>" . $row['Password'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['Birthday'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysql_close($conn);
            ?>

        </div>
        <div class="col-sm-4">
            <h3>Manager</h3>
            <p>Manage properties, handle accounts, and more</p>
            <a class="w3-btn" href="manager.php">Manager</a>
        </div>
        <div class="col-sm-4">
            <h3>Employee</h3>
            <p>Access necesary information to get stuff done...</p>
            <a class="w3-btn" href="https://google.com">Employee</a>
        </div>
    </div>
</div>

</body>
</html>
