<?php
$mysql_hostname = "127.0.0.1:3308";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "cms";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Could not connect database");

?>