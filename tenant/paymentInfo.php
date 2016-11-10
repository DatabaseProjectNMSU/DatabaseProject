<?php
include('Connection.php');
include('Constants.php');
$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $amount = trim($_POST['amt']);
    $method = trim($_POST['method']);
    $user = $_SESSION['userid'];
    //need TenUID
    $query="SELECT TenantID FROM Tenant WHERE UserID = '$user'";
    $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
    $tenUid=mysql_fetch_assoc($result); //data now holds value needed
    //need propId
    //need Apt NUm
    //need Transaction ID
} else {
    echo "Something went wrong!!";




    $query="";
    $result=mysql_query($query,$conn);