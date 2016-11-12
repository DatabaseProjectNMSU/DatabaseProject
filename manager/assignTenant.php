 <?php
include('../Connection.php');
include('../Constants.php');
$conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
$tenant = 'TN000000';
session_start();

//echo $type;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tuid = trim($_POST['tuid']);
    $aptnum = trim($_POST['aptnum']);
    $pid = trim($_POST['pid']);
}

$query = "UPDATE PropertyUnit SET Availability='N' WHERE PropertyID='$pid' and ApartmentNumber='$aptnum'";
if (mysql_query($query, $conn)) {
    echo '<script type="text/javascript">';
    echo 'alert("Availability Updated Successfully!");';
    //echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/manager/viewAccount.php";';
    echo '</script>';
    //mysql_close($conn);
} else {
    mysql_error();
}
$date=date("Y-m-d");

$query = "INSERT INTO StayIn(TenantUID,StartDate,PropertyID,ApartmentNumber) VALUES ('$tuid','$date','$pid','$aptnum')";
if (mysql_query($query, $conn)) {
    echo '<script type="text/javascript">';
    echo 'alert("Assignment Successful!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~rread/manager/viewAccount.php";';
    echo '</script>';
    mysql_close($conn);
} else {
    mysql_error();
}