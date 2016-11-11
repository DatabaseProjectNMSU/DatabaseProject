<?php
include('Connection.php');
include('Constants.php');
$conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
$tenant = 'TN000000';
session_start();
$type = $_SESSION['Type'];
//echo $type;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jobid = trim($_POST['jobid']);
    $rjob = trim($_POST['rjob']);
    $aptnum = trim($_POST['aptnum']);
    $pid = trim($_POST['pid']);
}

$muid=$_SESSION['muid'];

$query = "UPDATE MaintainReq SET RequestedJob='$rjob', ManagerUID='$muid', ApartmentNumber='$aptnum', PropertyID='$pid' WHERE JobID = '$jobid'";
if (mysql_query($query, $conn)) {
    echo '<script type="text/javascript">';
    echo 'alert("Edit Successful!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/manager/viewAccount.php";';
    echo '</script>';
    mysql_close($conn);
} else {
    mysql_error();
}