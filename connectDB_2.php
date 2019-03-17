<?php

$mysql_host = "localhost";
$mysql_database = "id921486_student";
$mysql_user = "id921486_partho";
$mysql_password = "idealschool'11";

$con = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
if(!$con) {
	die("Error in Connection".mysqli_connect_error());
}
?>