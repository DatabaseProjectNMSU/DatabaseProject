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
    <h1>Maintenance Requests</h1>
    <p>Lets ignore some work orders!</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Requests</h3>
           <?php
           session_start();
            $propertyid="";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $propertyid = trim($_POST['propertyid']);

            }else{
                echo "something went wrong!";
            }

           if(!empty($properyid) && !isset($_SESSION['pid'])) {
                $_SESSION['pid']=$propertyid;
           }else if(empty($properyid) && isset($_SESSION['pid']) && !empty($_SESSION['pid'])){
              $propertyid=$_SESSION['pid'];
           }else if(!empty($propertyid) && isset($_SESSION['pid']) && !empty($_SESSION['pid'])){
               $_SESSION['pid']=$propertyid;
           }


            //$userid = $_SESSION['userid'];
            $conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
            $query = "SELECT * FROM MaintainReq m WHERE m.PropertyID='$propertyid'";
            $result = mysql_query($query, $conn) or die('SQL Error :: ' . mysql_error());


            if ($result != null) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Job ID</th>";
                echo "<th>Requested Job</th>";
                echo "<th>Manager User ID</th>";
                echo "<th>Apartment Number</th>";
                echo "<th>PropertyID</th>";
                echo "</tr>";

                while($row=mysql_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["JobID"] . "</td>";
                    echo "<td>" . $row["RequestedJob"] . "</td>";
                    echo "<td>" . $row["ManagerUID"] . "</td>";
                    echo "<td>" . $row["ApartmentNumber"] . "</td>";
                    echo "<td>" . $row["PropertyID"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<p> the pid is " . $_SESSION['pid'] . "</p>";
            } else {
                echo "Something went wrong!";
            }

            ?>
            <br>
            <p>Delete Requests</p>
            <form action="deleteMaintain.php" method="POST">
                JobID: <input type="text" name="jobid" value=""><br>
                UserID: <input type="text" name="userid" value=""><br>
                Password: <input type="password" name="pw" value=""><br>
                <input type="submit">
            </form>
        </div>
        <div>
            <p>Edit Requests</p>
            <form action="editMaintain.php" method="POST">
                JobID: <input type="text" name="jobid" value=""><br>
                Requested Job: <input type="text" name="rjob" value=""><br>
                Apartment Number: <input type="text" name="aptnum" value=""><br>
                PropertyID: <input type="text" name="pid" value=""><br>
                <input type="submit">
            </form>

        </div>

    </div>
</div>

</body>
</html>



