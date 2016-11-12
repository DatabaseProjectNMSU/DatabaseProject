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
            $propertyid="";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $propertyid = trim($_POST['propertyid']);

            }else{
                echo "something went wrong!";
            }

            $_SESSION['pid']=$propertyid;

            //$userid = $_SESSION['userid'];
            $conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
            $query = "SELECT * FROM PropertyUnit m WHERE m.PropertyID='$propertyid'";
            $result = mysql_query($query, $conn) or die('SQL Error :: ' . mysql_error());


            if ($result != null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>ApartmentNumber</th>";
                echo "<th>Rent(in USD)</th>";
                echo "<th>Availability</th>";
                echo "<th>Number of Bedrooms</th>";
                echo "<th>Number of Bathrooms</th>";
                echo "</tr>";

                while($row=mysql_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["ApartmentNumber"] . "</td>";
                    echo "<td>" . $row["Rent"] . "</td>";
                    echo "<td>" . $row["Availability"] . "</td>";
                    echo "<td>" . $row["NumberofBedRoom"] . "</td>";
                    echo "<td>" . $row["NumberOfBathRoom"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                //echo "<p> the pid is " . $_SESSION['pid'] . "</p>";
            } else {
                echo "Something went wrong!";
            }

            ?>
            <br>
            <p><b>Edit a Unit - Input <u>ALL</u> Information or None!</b></p>
            <form action="editUnit.php" method="POST">
                Apartment Number: <input type="text" name="aptnum" value=""><br>
                Rent amount: <input type="text" name="rent" value=""><br>
                Availability('Y','N'): <input type="text" name="avail" value=""><br>
                Number of Bedrooms: <input type="text" name="numbed" value=""><br>
                Number of Bathrooms: <input type="text" name="numbath" value=""><br>
                <input type="submit">
            </form>
        </div>
        <div class="col-sm-5">
            <?php
            $query="Select * from Property where PropertyID='$propertyid'";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            $data=mysql_fetch_assoc($result);

            echo "<br>";
            echo "<p><b>Property Information</b></p>";

            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Property Name</th>";
                echo "<td>".$data["PropertyName"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>PropertyID</th>";
                echo "<td>".$data["PropertyID"]."</td>";
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
                echo "<tr>";
                echo "<th>Manager User ID</th>";
                echo "<td>".$data["ManagerUID"]."</td>";
                echo "</tr>";
                echo "</table>";
            }else{
                echo "Something went wrong!";
            }
            ?>
            <br>

            <p><b>Edit this property - Input <u>ALL</u> Information or None!</b></p>
            <form action="editProperty.php" method="POST">
                New Property Name: <input type="text" name="pname" value=""><br>
                Street Name: <input type="text" name="stname" value=""><br>
                Street Number: <input type="text" name="stnum" value=""><br>
                City: <input type="text" name="city" value=""><br>
                State: <input type="text" name="state" value=""><br>
                Zip: <input type="text" name="zip" value=""><br>
                Manager UserID: <input type="text" name="muid" value=""><br>
                <input type="submit">
            </form>

        </div>


    </div>
</div>

</body>
</html>



