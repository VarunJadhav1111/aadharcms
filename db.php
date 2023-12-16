<?php

$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "aadharcenter";
$conn = mysqli_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password ,$mysql_db_database) or die("Connection Error: " . mysqli_error($conn));


?>