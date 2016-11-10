<?php
include('Connection.php');
include('Constants.php');
session_start();
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
    $query="SELECT PropertyID, ApartmentNumber FROM Tenant INNER JOIN StayIn";
    $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
    $data=mysql_fetch_assoc($result); //data now holds value needed
    $propID=data['PropertyID'];
    //need Apt NUm
    $aptNum = data['ApartmentNumber'];
    //need Transaction ID
    date_default_timezone_set(date_default_timezone_get());
    $date = date('Y-m-d', time());

    $str = "Hello world!";
    echo $str;
    echo "<br>What a nice day!";
    /*
} else {
    echo "<P>Something went wrong!!</P>";
}



    $query="SELECT max(TransactionID) as m FROM Payment";
    $result = mysql_query($query,$conn) or die('SQL Error :: '.mysql_error());
    $oldID=mysql_fetch_assoc($result); //data now holds value needed

    $newID = ++$oldID;


    //$query="INSERT INTO Payment(TransactionID,PaymentMethod,Amount,Date) VALUES ($newID,'$method',$amount,'$date');";
    //mysql_query($query, $conn) or die('SQL Error :: '.mysql_error());

    //$query = "INSERT INTO MakePayment(TenantUID, PropertyID, ApartmentNumber, TransactionID) VALUES '$TenUID', $propID, $aptNum, $newID)";
    //mysql_query($query, $conn) or die('SQL Error :: '.mysql_error());

    mysql_close($conn);?>


?>