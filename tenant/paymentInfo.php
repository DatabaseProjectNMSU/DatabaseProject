<?php
include('../Connection.php');
include('../Constants.php');
session_start();
$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

if($_SERVER['REQUEST_METHOD']=='POST') {
    $amount = trim($_POST['amt']);
    $method = trim($_POST['method']);
} else {
    echo "<P>Something went wrong!!</P>";
}


$user = $_SESSION['userid'];

//need TenUID

$query = "SELECT UserID FROM Tenant WHERE UserID = '$user'";
$result = mysql_query($query, $conn) or die('SQL Error :: ' . mysql_error());
$tenUid1 = mysql_fetch_array($result); //data now holds value needed
$tenUid = $tenUid1['UserID'];
//need propId

$query=
    "SELECT PropertyID, ApartmentNumber
FROM StayIn
WHERE TenantUID = '$user';";
$result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
$data=mysql_fetch_assoc($result); //data now holds value needed
$propID=$data['PropertyID'];

//need Apt NUm
$aptNum = $data['ApartmentNumber'];
//need Transaction ID
date_default_timezone_set('America/Denver');
$date = date('Y-m-d', time());


$query="SELECT max(TransactionID) as m FROM Payment;";
$result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
$dataID = mysql_fetch_assoc($result); //data now holds value needed
$oldID = $dataID['m'];
$newID = ++$oldID;

$query="INSERT INTO Payment VALUES (".$newID.",'$method',".$amount.",'$date');";
$a = mysql_query($query, $conn) or die('SQL Error :: '.mysql_error());

$query = "INSERT INTO MakePayment VALUES ('$tenUid',".$propID.",".$aptNum.",".$newID.");";
$b = mysql_query($query, $conn) or die('SQL Error :: '.mysql_error());

if($a != FALSE && $b != FALSE){
    echo '<script type="text/javascript">';
    echo 'alert("Payment successfully processed.");';
    echo 'document.location.href="viewAccount.php";';
    echo '</script>';
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Issue processing payment.");';
    echo 'document.location.href="makePayment.php";';
    echo '</script>';
}

mysql_close($conn);
?>