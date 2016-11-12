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
    $new_phn = trim($_POST['new_phn']);
}else{
    echo '<script type="text/javascript">';
    echo 'alert("Issue in browser.");';
}



$userid=$_SESSION['userid'];
$usertype=$_SESSION['Type'];

if($usertype == 'manager') {

    $conn = GetConnection($DBUser, $DBpass, $DBHost, $DBname);
    $query = "INSERT INTO UserPhoneNumber VALUES ('$userid', $new_phn);";

    if (mysql_query($query, $conn)) {
        echo '<script type="text/javascript">';

        echo 'document.location.href="http://www.cs.nmsu.edu/~rread/manager/viewAccount.php";';

        echo '</script>';
        mysql_close($conn);
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Phone update creation NOT successful!\n");';
        echo 'document.location.href="http://www.cs.nmsu.edu/~rread/manager/addPhoneMain.php";';
        echo '</script>';
    }
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Phone update creation NOT successful!\n Please check Usertype");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~rread/";';
    echo '</script>';
}



?>