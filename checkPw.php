<?php
session_start();
include('Connection.php');
include('Constants.php');

$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

if($_SERVER['REQUEST_METHOD']=='POST') {
    $userid = trim($_POST['uname']);
    $pw = trim($_POST['psw']);
}else{
    echo "Something went wrong!!";
}

$query = "SELECT Password FROM User WHERE UserID='$userid'";
$result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
$data = mysql_fetch_assoc($result);
$userpw=$data["Password"];

if($userpw==null){
    echo '<script type="text/javascript">';
    echo 'alert("You done messed up A-a-ron!\n Username or Password not correct!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant/ten_log_in.php";';
    echo '</script>';
}

if($userpw==$pw){
    $_SESSION['userid']=$userid;
    echo '<script type="text/javascript">';
    echo 'alert("Log-in successful!");';
    echo 'document.location.href="./tenant/viewAccount.php";';
    echo '</script>';
    mysql_close($conn);

} else {
    echo '<script type="text/javascript">';
    echo 'alert("You done messed up A-a-ron!\n Username or Password not correct!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant/ten_log_in.php";';
    echo '</script>';
}

mysql_close($conn);

?>


