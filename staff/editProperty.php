<?php
include('../Connection.php');
include('../Constants.php');
$conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
session_start();

//echo $type;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pname = trim($_POST['pname']);
    $stname = trim($_POST['stname']);
    $stnum = trim($_POST['stnum']);
    $state = trim($_POST['state']);
    $zip = trim($_POST['zip']);
    $muid = trim($_POST['muid']);

}

$pid=$_SESSION['pid'];

$query = "Update Property Set PropertyName='$pname', StreetName='$stname', StreetNumber='$stnum', State='$state', Zip='$zip', ManagerUID='$muid' Where PropertyID='$pid'";
if (mysql_query($query, $conn)) {
    echo '<script type="text/javascript">';
    echo 'alert("Edit Successful!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~rread/staff/viewAccount.php";';
    echo '</script>';
    mysql_close($conn);
} else {
    mysql_error();
}