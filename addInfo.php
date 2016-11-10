<?php
include('Connection.php');
include('Constants.php');
$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
$tenant = 'TN000000';
session_start();
$type=$_SESSION['Type'];
//echo $type;

if($_SERVER['REQUEST_METHOD']=='POST'){
    if($type=='Tenant') {
        $userid = trim($_POST['userid']);
        $pw = trim($_POST['pw']);
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $dob = trim($_POST['dob']);
    }else if($type=='Man'){
        $userid = trim($_POST['userid']);
        $pw = trim($_POST['pw']);
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $dob = trim($_POST['dob']);
        $officeid=trim($_POST['officeid']);
    }else if($type=='Staff'){
        $userid = trim($_POST['userid']);
        $pw = trim($_POST['pw']);
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $dob = trim($_POST['dob']);
        $title=trim($_POST['title']);
        $officeid=trim($_POST['officeid']);
    }
} else {
    echo "Something went wrong!!";
}

if(strlen($userid)<8 || strlen($userid)>16){
    echo '<script type="text/javascript">';
    echo 'alert("UserID must be at least 8 characters, but no greater than 16!");';
    //echo 'document.location.href="http://www.cs.nmsu.edu/~rread/createTenant.php";';
    echo '</script>';
}else{
    $query="SELECT * FROM User WHERE UserID='$userid'";
    $result=mysql_query($query,$conn);
    if(mysql_num_rows($result)>0) {
        echo '<script type="text/javascript">';
        echo 'alert("That UserID is already taken!");';
      //  echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/createTenant.php";';
        echo '</script>';
    }else if($type=='Tenant') {
        $query = "insert into User values ('$userid', '$pw', '$fname', '$lname','$dob','$email')";
        if (mysql_query($query, $conn)) {
            echo '<script type="text/javascript">';
            echo 'alert("Account creation successful!");';
            // echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant.php";';
            echo '</script>';
            //mysql_close($conn);
            //$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

            //$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query = "SELECT max(TenantID) as m FROM Tenant";
            $result = mysql_query($query, $conn) or die('SQL Error :: ' . mysql_error());
            $data = mysql_fetch_assoc($result); //data now holds value needed

            $str = ++$data['m'];


            $query = "insert into Tenant values ('$userid', '$str')";
            if (mysql_query($query, $conn)) {
                echo '<script type="text/javascript">';
                echo 'alert("Tenant Account creation successful!\n Redirecting to login page!");';
                echo 'document.location.href="./tenant.php";';
                echo '</script>';
                //mysql_close($conn);
            }
        } else {
            echo mysql_error();
        }
    }else if($type=='Man') {
        $query = "insert into User values ('$userid', '$pw', '$fname', '$lname','$dob','$email')";
        if (mysql_query($query, $conn)) {
            echo '<script type="text/javascript">';
            echo 'alert("Account creation successful!");';
            // echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant.php";';
            echo '</script>';
            //mysql_close($conn);
            //$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

            //$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query = "SELECT max(EmployeeID) as m FROM Manager";//need to double-check this.
            $result = mysql_query($query, $conn) or die('SQL Error :: ' . mysql_error());
            $data = mysql_fetch_assoc($result); //data now holds value needed

            $str = ++$data['m'];


            $query = "insert into Manager values ('$userid', '$str','$officeid')";
            if (mysql_query($query, $conn)) {
                echo '<script type="text/javascript">';
                echo 'alert("Manager Account creation successful!\n Redirecting to login page!");';
                echo 'document.location.href="http://www.cs.nmsu.edu/~sbarnes/manager.php";';
                echo '</script>';
                //mysql_close($conn);
            }else {
                echo mysql_error();
            }
        } else {
            echo mysql_error();
        }

    }else if($type=='Staff') {
        $query = "insert into User values ('$userid', '$pw', '$fname', '$lname','$dob','$email')";
        if (mysql_query($query, $conn)) {
            echo '<script type="text/javascript">';
            echo 'alert("Account creation successful!");';
            // echo 'document.location.href="http://www.cs.nmsu.edu/~rread/tenant.php";';
            echo '</script>';
            //mysql_close($conn);
            //$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);

            //$conn= GetConnection($DBUser, $DBpass, $DBHost,$DBname);
            $query = "SELECT max(EmployeeID) as m FROM Staff";//need to double-check this.
            $result = mysql_query($query, $conn) or die('SQL Error :: ' . mysql_error());
            $data = mysql_fetch_assoc($result); //data now holds value needed

            $str = ++$data['m'];


            $query = "insert into Staff values ('$userid', '$str','$title','$officeid')";
            if (mysql_query($query, $conn)) {
                echo '<script type="text/javascript">';
                echo 'alert("Staff Account creation successful!\n Redirecting to login page!");';
                echo 'document.location.href="./staff.php";';
                echo '</script>';
                //mysql_close($conn);
            }
        } else {
            echo mysql_error();
        }
    }
}
mysql_close($conn);
?>