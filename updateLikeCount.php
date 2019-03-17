<?php 
	require 'connectDB_2.php';

	$like = $_POST["like"];
	$name = $_POST["username"];
	$time = $_POST["time"];

$id = $_POST["id"];
	$post = $_POST["post"];
	$picname = $_POST["picname"];

	$update_record  = "UPDATE main_server SET like_count='$like' WHERE name='$name' and time='$time'";
	if(mysqli_query($con,$update_record)) {
		//echo " Data insertion Successful ";
	}
	else {
		//echo "Data insertion error ... " . mysqli_error($con);
	}
	mysqli_close($con);
?>