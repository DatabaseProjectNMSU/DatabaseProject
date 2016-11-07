<?php

include('Connection.php');
include('Constants.php');

$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

if($_SERVER['REQUEST_METHOD']=='POST') {
    $userid = trim($_POST['uname']);
    $pw = trim($_POST['psw']);
}else{
    echo "Something went wrong!!";
}

$query = "SELECT Password FROM User WHERE Password='$pw'";

if(mysql_query($query,$conn)){
    if($query==$pw){
        mysql_close($conn);
        echo '<script type="text/javascript">';
        echo 'alert("Log-in successful!");';
        echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/";';
        echo '</script>';
    }
} else {
    echo mysql_error();
}


