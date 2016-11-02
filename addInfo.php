<?php
include('Connection.php');
include('Constants.php');

$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $userid = trim($_POST['userid']);
    $pw = trim($_POST['pw']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $dob = trim($_POST['dob']);
} else {
    echo "Something went wrong!!";
}

$query = "insert into User values ('$userid', '$pw', '$fname', '$lname','$dob','$email')";
if(mysql_query($query,$conn)){
    echo 'DONE';
    mysql_close($conn);
} else {
    echo mysql_error();
}
mysql_close($conn);
?>