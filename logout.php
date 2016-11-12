<?php
/**
 * Created by PhpStorm.
 * User: rread
 * Date: 11/10/16
 * Time: 3:07 PM
 */

unset($_SESSION['userid']);
session_destroy();


echo '<script type="text/javascript">';
echo 'alert("Logged out.");';
echo 'document.location.href="index.php";';
echo '</script>';


?>