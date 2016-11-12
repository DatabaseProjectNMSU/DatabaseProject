<?php
include('../Connection.php');
include('../Constants.php');
$conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
session_start();

//echo $type;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = trim($_POST['phone']);
    $stname = trim($_POST['stname']);
    $stnum = trim($_POST['stnum']);
    $state = trim($_POST['state']);
    $zip = trim($_POST['zip']);

}

$oid=$_SESSION['oid'];


$query = "Update Office Set PhoneNumber='$phone',StreetName='$stname', StreetNumber='$stnum', State='$state', Zip='$zip' Where OfficeID='$oid'";
if (mysql_query($query, $conn)) {
    echo '<script type="text/javascript">';
    echo 'alert("Edit Successful!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/staff/viewAccount.php";';
    echo '</script>';
    mysql_close($conn);
} else {
    mysql_error();
}