<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../Connection.php');
include('../Constants.php');
unset($_SESSION['pid']);
?>
<head>
    <title>Tenant Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Tenant Management</h1>
    <p>Lets assign sone apartments!</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Tenant Assignments</h3>
            <?php
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
            $query="select PropertyID, ApartmentNumber from PropertyUnit where Availability = 'Y'";
            $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
            //$data=mysql_fetch_assoc($result);

            echo "<br>";
            echo "<p><b>The Following Apartments are Available for Assignment!</b></p>";
            if($result!=null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Property ID</th>";
                echo "<th>Apartment Number</th>";
                echo "</tr>";

                while($row=mysql_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["PropertyID"] . "</td>";
                    echo "<td>" . $row["ApartmentNumber"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "Something went wrong!";
            }


            mysql_close($conn);
            ?>
            <br>
            <p>Assign a Tenant</p>
            <form action="assignTenant.php" method="POST">
                Tenant UserID: <input type="text" name="tuid" value=""><br>
                PropertyID: <input type="text" name="pid" value=""><br>
                Apartment Number:<input type="text" name="aptnum" value=""><br>
                <input type="submit">
            </form>
        </div>



    </div>

</div>

</body>
</html>
