<?php
	require "init.php";
	$us_name = $_POST["loginName"];
	$us_pass = $_POST["loginPass"] ;

	$retrieve_query = "select name from user_info where user_name =  '$us_name' and user_pass  = '$us_pass'";
	$result = mysqli_query($con , $retrieve_query);
	
	
	if( mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$name  = $row["name"];
		echo  "Welcome ". $name ;
	}
	
	else  {
		echo "Invalid Username and Password";
	}
?>