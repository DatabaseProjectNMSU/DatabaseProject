<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../Connection.php');
include('../Constants.php');
?>
<head>
    <title>Manager Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Properties</h1>
    <p>Lets mess some stuff up!</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <h3>Property Information</h3>
            <?php
            session_start();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $officeid = trim($_POST['officeid']);

            }else{
                echo "something went wrong!";
            }

            $_SESSION['oid']=$officeid;

            $conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
            $query="Select * from Office where OfficeID='$officeid'";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            $data=mysql_fetch_assoc($result);

            echo "<br>";
            echo "<p><b>Office Information</b></p>";

            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Phone Number</th>";
                echo "<td>".$data["PhoneNumber"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Street Name</th>";
                echo "<td>".$data["StreetName"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Street Number</th>";
                echo "<td>".$data["StreetNumber"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>City</th>";
                echo "<td>".$data["City"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>State</th>";
                echo "<td>".$data["State"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Zip</th>";
                echo "<td>".$data["Zip"]."</td>";
                echo "</tr>";
                echo "</table>";
            }else{
                echo "Something went wrong!";
            }
            ?>
            <br>

            <p><b>Edit this Office - Input <u>ALL</u> Information or None!</b></p>
            <form action="editOffice.php" method="POST">
                Phone Number: <input type="text" name="phone" value=""><br>
                Street Name: <input type="text" name="stname" value=""><br>
                Street Number: <input type="text" name="stnum" value=""><br>
                City: <input type="text" name="city" value=""><br>
                State: <input type="text" name="state" value=""><br>
                Zip: <input type="text" name="zip" value=""><br>
                <input type="submit">
            </form>

        </div>


    </div>
</div>

</body>
</html>



