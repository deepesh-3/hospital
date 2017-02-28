<?php
    $dbhost = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "admin";
    $dbname = "test";

$connection = mysql_connect($dbhost, $dbusername, $dbpassword) or die('Could not connect');
echo "connected";
$db = mysql_select_db($dbname);
?>