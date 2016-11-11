<?php
include('../Connection.php');
include('../Constants.php');
$conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
$tenant = 'TN000000';
session_start();

//echo $type;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = trim($_POST['date']);
    $muid = trim($_POST['muid']);
    $rjob = trim($_POST['rjob']);
    $aptnum = trim($_POST['aptnum']);
    $pid = trim($_POST['pid']);
}

$query = "SELECT max(JobID) as m FROM MaintainReq";
$result = mysql_query($query, $conn) or die('SQL Error :: ' . mysql_error());
$data = mysql_fetch_assoc($result); //data now holds value needed

$jobid = ++$data['m'];

$query = "INSERT INTO MaintainReq VALUES ('$jobid','$date','$rjob','$muid','$pid','$aptnum')";
if (mysql_query($query, $conn)) {
    echo '<script type="text/javascript">';
    echo 'alert("Request creation successful!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/manager/viewAccount.php";';
    echo '</script>';
    mysql_close($conn);
} else {
    mysql_error();
}