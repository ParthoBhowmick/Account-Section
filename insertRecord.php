<?php 
	require 'connectDB_2.php';

	$id = $_POST["id"];
	$contact = "";
	$pro = $_POST["product"];
	$amount = $_POST["quantity"];
	$price = $_POST["price"];
	$time = $_POST["time"];
        $name ="";

      $find_user = "select * from user_info where username = '$id'";
				if($run_find_user = mysqli_query($con,$find_user)) {
					if(mysqli_num_rows($run_find_user)==1) {
				$row = mysqli_fetch_assoc($run_find_user);
				$name = $row["name"];
				$contact = $row["phn_no"];
					}
				}
	
	$insert_record  = "insert into BechaKenarKhata values ('$name','$contact','$pro','$amount','$price','$time','No')";
	if(mysqli_query($con,$insert_record)) {
		//echo " Data insertion Successful ";
	}

?>