<?php
include('../Connection.php');
include('../Constants.php');
$conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
session_start();

//echo $type;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aptnum = trim($_POST['aptnum']);
    $rent = trim($_POST['rent']);
    $avail = trim($_POST['avail']);
    $numbed = trim($_POST['numbed']);
    $numbath = trim($_POST['numbath']);

}

$pid=$_SESSION['pid'];

$query = "Update PropertyUnit Set Rent='$rent', Availability='$avail', NumberofBedRoom='$numbed', NumberOFBathRoom='$numbath' Where PropertyID='$pid' and ApartmentNumber='$aptnum'";
if (mysql_query($query, $conn)) {
    if($avail=='Y'){
        $query="DELETE FROM StayIn WHERE PropertyID=$pid AND ApartmentNumber=$aptnum;";
        mysql_query($query, $conn);
    }
    echo '<script type="text/javascript">';
    echo 'alert("Edit Successful!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~rread/staff/viewAccount.php";';
    echo '</script>';

    mysql_close($conn);
} else {
    mysql_error();
}