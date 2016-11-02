<?php

function getConnection($DBUser, $DBpass, $DBHost, $DBname){
    $conn = mysql_connect($DBHost, $DBUser, $DBpass) or die(mysql_error());
    if(!mysql_select_db($DBname, $conn)){
        echo mysql_error();
    }
    return $conn;
}

?>