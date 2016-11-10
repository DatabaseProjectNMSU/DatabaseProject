<!DOCTYPE html>
<html lang="en">
<?php
session_start();
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
    <h1>Manager Account</h1>
    <p>View your Personal info, make payments, etc...</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Tenant Info</h3>
            <p>You can access your account here</p>
            <?php
            $userid=$_SESSION['userid'];
            $conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query="SELECT * FROM User INNER JOIN UserPhoneNumber WHERE User.UserID='$userid'";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            $data=mysql_fetch_assoc($result);

            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>UserID</th>";
                echo "<td>".$data["UserID"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>First Name</th>";
                echo "<td>".$data["FirstName"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Last Name</th>";
                echo "<td>".$data["LastName"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Birthday</th>";
                echo "<td>".$data["Birthday"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Email</th>";
                echo "<td>".$data["email"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Phone</th>";
                echo "<td>".$data["PhoneNumber"]."</td>";
                echo "</tr>";
                echo "</table>";
            }else{
                echo "Something went wrong!";
            }
            mysql_close($conn);
            ?>

            <a class="w3-btn" href="edictContact.php">Edit Phone</a>

        </div>
        <div class="col-sm-4">
            <h3>Manager</h3>
            <p>Manage properties, handle accounts, and more</p>
            <a class="w3-btn" href="manager.php">Manager</a>
        </div>
        <div class="col-sm-4">
            <h3>Change Password</h3>
            <p>Kick out a roommate?</p>
            <a class="w3-btn" href="ChangePassword.php?a=user">Change Password</a>
            <h3>Change phone</h3>
            <p>New Iphone?</p>
            <a class="w3-btn" href="ChangePassword.php?a=phone">Change Phone</a>
            <h3>Change Email</h3>
            <p>Blocked an ex?</p>
            <a class="w3-btn" href="ChangePassword.php?a=email">Change Email</a>
        </div>
    </div>
</div>

</body>
</html>
