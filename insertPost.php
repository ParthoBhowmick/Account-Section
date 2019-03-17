<?php 
	require 'connectDB_2.php';

	$id = $_POST["id"];
        $name = '';
        $pro_pic = '';
	$post = $_POST["post"];
	$picname = $_POST["picname"];
	$privacy = $_POST["privacy"];
	$time = $_POST["time"];

	
	$query_user_account_balance = "select * from user_info where username = '$id'";
				if($run_user_account_balance = mysqli_query($con,$query_user_account_balance)) {
					if(mysqli_num_rows($run_user_account_balance)==1) {
				$row = mysqli_fetch_assoc($run_user_account_balance);
				$pro_pic = $row["pro_pic_name"];

				$name = $row["name"];
				}
			}
		
	$insert_record  = "insert into main_server values ('$name','$pro_pic','$id','$post','$picname','$time','0','0','0','1','$privacy')";
	if(mysqli_query($con,$insert_record)) {
		//echo " Data insertion Successful ";
	}
	else {
		//echo "Data insertion error ... " . mysqli_error($con);
	}

?>