<?php 
	require 'connectDB_2.php';

	$id = $_POST["id"];
	$username = $_POST["username"];
	$picname = $_POST["userPic"];
	$comment = $_POST["Comment"];
	$time = $_POST["time"];

        $update_record  = "UPDATE main_server SET comment_count=comment_count+1 WHERE post_id = '$id'";
	if(mysqli_query($con,$update_record)) {
		//echo " Data insertion Successful ";
	}
	else {
		//echo "Data insertion error ... " . mysqli_error($con);
	}

	$insert_record  = "insert into CommentDetails values ('$id','$username','$time','$picname','$comment')";
	if(mysqli_query($con,$insert_record)) {
		//echo " Data insertion Successful ";
	}
	else {
		//echo "Data insertion error ... " . mysqli_error($con);
	}

?>