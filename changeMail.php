<?php
/**
 * Created by PhpStorm.
 * User: rread
 * Date: 11/9/16
 * Time: 12:07 PM
 */
session_start();
include('Connection.php');
include('Constants.php');

$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);


if($_SERVER['REQUEST_METHOD']=='POST') {
    $new_email = trim($_POST['new_email']);
}else{
    echo '<script type="text/javascript">';
    echo 'alert("Issue in browser.");';
}

$uid=$_SESSION['userid'];
$usertype=$_SESSION['Type'];

$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
$query="UPDATE User SET email = '$new_email' WHERE UserID = $uid;";

if (mysql_query($query, $conn)) {
    echo '<script type="text/javascript">';
    echo 'alert("Phone update successful!\n Redirecting to login page!");';
    if($usertype = 'tenant'){
        echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant/viewAccount.php";';
    }
    else if($usertype = 'employee'){
        echo 'document.location.href="http://www.cs.nmsu.edu/~rread/employee/viewAccount.php";';
    }
    else{
        echo 'document.location.href="http://www.cs.nmsu.edu/~rread/manager/viewAccount.php";';
    }
    echo '</script>';
    mysql_close($conn);
}else{
    echo '<script type="text/javascript">';
    echo 'alert("Phone update creation NOT successful!\n Please check old phone.");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant/changePhoneMain.php";';
    echo '</script>';
}

?>