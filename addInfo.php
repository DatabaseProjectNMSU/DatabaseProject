<?php
include('Connection.php');
include('Constants.php');

$tenant="TN000000";

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

if(strlen($userid)<8){
    echo '<script type="text/javascript">';
    echo 'alert("UserID must be at least 8 characters!");';
    echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/createTenant.php";';
    echo '</script>';

}else{
    $query = "insert into User values ('$userid', '$pw', '$fname', '$lname','$dob','$email')";
    if (mysql_query($query, $conn)) {
        echo '<script type="text/javascript">';
        echo 'alert("Account creation successful!\n Redirecting to login page!");';
        echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/tenant.php";';
        echo '</script>';

    } else {
        echo mysql_error();
    }
    $query = "INSERT INTO Tenant VALUES ('$userid', '$tenant')";
    if(mysql_query($query, $conn)) {
        $tenant++;
        echo $tenant;
        mysql_close($conn);
    } else{
        echo mysql_error();
    }

}
mysql_close($conn);
?>