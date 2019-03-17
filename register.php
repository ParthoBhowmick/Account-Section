<?php 
	require 'connectDB_2.php';

	$name = $_POST["user"];
	$user_name = $_POST["username"];
	$user_pass = $_POST["userpasss"];
	$user_contact = $_POST["usercontact"];
	$user_email = $_POST["useremail"];
	
	$insert_record  = "insert into user_info values ('$name','$user_name','$user_pass','noimg.png','$user_email','$user_contact')";
	if(mysqli_query($con,$insert_record)) {
		//echo " Data insertion Successful ";
	}
	else {
		//echo "Data insertion error ... " . mysqli_error($con);
	}
?>