<?php
/**
 * Created by PhpStorm.
 * User: rread
 * Date: 11/9/16
 * Time: 12:07 PM
 */
session_start();
include('../Connection.php');
include('../Constants.php');

$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

if($_SERVER['REQUEST_METHOD']=='POST') {
    $pwd = trim($_POST['passw']);
}else{
    echo "Something went wrong!!";
}


$userid=$_SESSION['userid'];

$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
$query="UPDATE User SET Password = '$pwd' WHERE UserID = '$userid'";

        if (mysql_query($query, $conn)) {
            echo '<script type="text/javascript">';
            echo 'alert("Password update creation successful!\n Redirecting to login page!");';
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
            echo 'alert("Password update creation NOT successful!\n Redirecting to login page!");';
            echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant/viewAccount.php";';
            echo '</script>';
        }



?>