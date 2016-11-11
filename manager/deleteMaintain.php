<?php
session_start();
include('../Connection.php');
include('../Constants.php');
$conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jobid = trim($_POST['jobid']);
    $userid = trim($_POST['userid']);
    $pw = trim($_POST['pw']);

} else {
    echo "something went wrong!";
}


//check user name and password
$query = "SELECT Password FROM User WHERE UserID='$userid'";
$result = mysql_query($query, $conn) or die('SQL Error :: ' . mysql_error());
$data = mysql_fetch_assoc($result);
$userpw = $data["Password"];

if ($userpw == null) {
    echo '<script type="text/javascript">';
    echo 'alert("You done messed up A-a-ron!\n Username or Password not correct!");';
    //echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant/ten_log_in.php";';
    echo '</script>';
} else if ($userpw == $pw) {
    $query = "DELETE FROM MaintainReq WHERE JobID='$jobid'";
    if (mysql_query($query, $conn)) {
        echo '<script type="text/javascript">';
        echo 'alert("Delete Successful!");';
        echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/manager/viewAccount.php";';
        echo '</script>';
        mysql_close($conn);
    } else {
        mysql_error();
    }

} else {
    echo '<script type="text/javascript">';
    echo 'alert("You done messed up A-a-ron!\n Username or Password not correct!");';
    //echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant/ten_log_in.php";';
    echo '</script>';
}
