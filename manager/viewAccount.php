<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../Connection.php');
include('../Constants.php');
$_SESSION['Type'] = 'manager';
unset($_SESSION['pid']);
?>
<head>
    <title>Manager Account</title>
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
    <h1>Manager Account</h1>
    <p>Lets ignore some work orders!</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Manager Info</h3>
            <!--<p>You can access your account here</p>-->
            <?php
            $userid=$_SESSION['userid'];
            $conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query="SELECT * FROM User NATURAL JOIN UserPhoneNumber WHERE User.UserID='$userid'";
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
            $query="Select o.OfficeID, PhoneNumber, StreetName, StreetNumber, City, State, Zip from Office o, Manager m where m.UserID='$userid' and m.OfficeID=o.OfficeID";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            $data=mysql_fetch_assoc($result);
            $officeid=$data['OfficeID'];

            echo "<br>";
            echo "<p><b>Office</b></p>";
            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>OfficeID</th>";
                echo "<td>".$data["OfficeID"]."</td>";
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

            <!--<a class="w3-btn" href="../editInfo.php">Edit Phone</a>
            <a class="w3-btn" href="../editInfo.php">Edit Email</a> -->

        </div>
        <div class="col-sm-4">
            <h3>Office Employees</h3>
            <?php
            $userid=$_SESSION['userid'];
            $conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query="Select FirstName, LastName, Birthday, email, PhoneNumber, EmployeeID, Title From Staff s, User u, UserPhoneNumber p where s.UserID=u.UserID and OfficeID=$officeid and p.UserID=u.userID";
            //$query = "Select firstName, LastName, Birthday, email, PhoneNumber, EmployeeID, Title FROM (Staff OUTER JOIN UserPhoneNumber as p WHERE Staff.UserID = UserPhoneNumber.UserID) OUTER JOIN User WHERE p.;";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            //$data=mysql_fetch_assoc($result);

            echo "<br>";
            echo "<p><b>Your Minions</b></p>";
            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>FirstName</th>";
                echo "<th>LastName</th>";
                echo "<th>Birthday</th>";
                echo "<th>email</th>";
                echo "<th>Phone Number</th>";
                echo "<th>Employee ID</th>";
                echo "<th>Title</th>";
                echo "</tr>";

                while($row=mysql_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["FirstName"] . "</td>";
                    echo "<td>" . $row["LastName"] . "</td>";
                    echo "<td>" . $row["Birthday"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["PhoneNumber"] . "</td>";
                    echo "<td>" . $row["EmployeeID"] . "</td>";
                    echo "<td>" . $row["Title"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "Something went wrong!";
            }


            mysql_close($conn);
            ?>
        </div>
        <!--<div class="col-sm-4">
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

        </div>-->
    </div>
    <div>
        <div class="col-sm-3">
            <br><br>
            <h3>Update or add information</h3>
            <p>Email hacked?</p>
            <a class="w3-btn" href="../ChangePassword.php">Change Password</a>
            <br><br>
            <p>New Iphone?</p>
            <a class="w3-btn" href="../changePhoneMain.php">Change Phone</a>
            <br><br>
            <p>Another phone?</p>
            <a class="w3-btn" href="../addPhoneMain.php">Add Phone</a>
            <br><br>
            <p>Blocked an ex?</p>
            <a class="w3-btn" href="../editEmail.php">Change Email</a>
            <br><br>
            <p>Assign Living Quarters?</p>
            <a class="w3-btn" href="./tenantAssignment.php">View Unassigned Tenants</a>
            <br><br>


        </div>
        <div class = "col-sm-5">
        <h3>Maintainance Requests</h3>
        <p>View Maintainance Requests</p>
            <form action="getMaintain.php" method="POST">
                PropertyID: <input type="text" name="propertyid" value=""><br>
                <input type="submit">
            </form>
            <br>
            <p>Create a Maintainance Request</p>
            <form action="createMaintain.php" method="POST">
                Date (YYYY-MM-DD): <input type="text" name="date" value=""><br>
                Requested Job:<input type="text" name="rjob" value=""><br>
                Your Manager ID:<input type="text" name="muid" value=""><br>
                Apartment Number:<input type="text" name="aptnum" value=""><br>
                PropertyID: <input type="text" name="pid" value=""><br>
                <input type="submit">
            </form>
        </div>
       <!-- <div>
            <h3>Tenant Assignments</h3>
            <?php
            /*
            $conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query="Select u.UserID, TenantID, FirstName, LastName from User u, (Select * FROM Tenant as t WHERE NOT EXISTS(Select * FROM StayIn as s WHERE t.UserID=s.TenantUID )) as m where u.UserID=m.UserID;";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            //$data=mysql_fetch_assoc($result);

            echo "<br>";
            echo "<p><b>The Following Tenants do not have an assigned apartment!</b></p>";
            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>UserID</th>";
                echo "<th>TenantID</th>";
                echo "<th>FirstName</th>";
                echo "<th>LastName</th>";
                echo "</tr>";

                while($row=mysql_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["UserID"] . "</td>";
                    echo "<td>" . $row["TenantID"] . "</td>";
                    echo "<td>" . $row["FirstName"] . "</td>";
                    echo "<td>" . $row["LastName"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "Something went wrong!";
            }


            mysql_close($conn);
            */
            ?>

        </div>-->


    </div>

</div>

</body>
</html>
