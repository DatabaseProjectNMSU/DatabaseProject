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
    <a href='../logout.php'>Click here to log out</a>
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
            <!--<p>You can access your account here</p>-->
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
                echo "<td>$userid</td>";
                //echo "<td>".$data["UserID"]."</td>";
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

            <!--<a class="w3-btn" href="../editInfo.php">Edit Phone</a>
            <a class="w3-btn" href="../editInfo.php">Edit Email</a> -->

        </div>
        <div class="col-sm-4">
            <h3>Apartment Information</h3>
            <?php
            $userid=$_SESSION['userid'];
            $conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query="Select TenantID, StartDate,PropertyID, ApartmentNumber from User u, Tenant t,StayIn s where s.TenantUID=u.UserID and u.UserID=t.UserID and u.UserID='$userid'";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            $data=mysql_fetch_assoc($result);
            $tenantid=$data['TenantID'];
            $propertyid=$data['PropertyID'];

            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>PropertyID</th>";
                echo "<td>".$data["PropertyID"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Apartment Number</th>";
                echo "<td>".$data["ApartmentNumber"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Living in squalor since</th>";
                echo "<td>".$data["StartDate"]."</td>";
                echo "</tr>";
                echo "</table>";
            }else{
                echo "Something went wrong!";
            }
            $query="Select FirstName,LastName,PhoneNumber, o.StreetName, o.StreetNumber, o.City, o.State, o.Zip from Property p, User u, Manager m, Office o WHERE p.PropertyID='$propertyid' and p.ManagerUID=u.UserID and m.UserID=u.UserID and o.OfficeID=m.OfficeID";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            $data=mysql_fetch_assoc($result);

            echo "<br>";
            echo "<p><b>Apartment Manager Information</b></p>";
            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Manager First Name</th>";
                echo "<td>".$data["FirstName"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Last Name</th>";
                echo "<td>".$data["LastName"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Office Phone Number</th>";
                echo "<td>".$data["PhoneNumber"]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Office Street Name</th>";
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


            mysql_close($conn);
            ?>
        </div>
        <div class="col-sm-4">
            <h3>Change Password</h3>
            <p>Kick out a roommate?</p>
            <a class="w3-btn" href="ChangePassword.php?a=password">Change Password</a>
            <h3>Change phone</h3>
            <p>New Iphone?</p>
            <a class="w3-btn" href="editContact.php?a=phone">Change Phone</a>
            <h3>Change Email</h3>
            <p>Blocked an ex?</p>
            <a class="w3-btn" href="editContact.php?a=email">Change Email</a>
            <h3>Make Payment</h3>
            <p>Most Important Button Here</p>
            <a class="w3-btn" href="makePayment.php">Make Payment</a>

        </div>
    </div>
</div>

</body>
</html>
