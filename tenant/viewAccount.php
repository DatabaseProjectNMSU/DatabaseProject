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
    <h1>Tenant Account</h1>
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
            $query="SELECT * FROM User WHERE UserID='$userid'";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            $data=mysql_fetch_assoc($result);

            if($result!=null) {
                echo "<table border='1'>
                    <tr>
                    <th>UserID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Email</th>
                    </tr>";
                echo "<tr>";
                echo "<td>".$data["UserID"]."</td>";
                echo "<td>".$data["FirstName"]."</td>";
                echo "<td>".$data["LastName"]."</td>";
                echo "<td>".$data["Birthday"]."</td>";
                echo "<td>".$data["email"]."</td>";
                echo "</tr>";

                echo "</table>";
            }else{
                echo "Something went wrong!";
            }
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
