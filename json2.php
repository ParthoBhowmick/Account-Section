<?php
	require 'connectDB_2.php';
	$pid = $_POST["pid"];	
	$sql = "select * from CommentDetails where PostID='$pid' order by time DESC";
	$result = mysqli_query($con,$sql);
	$response = array();
	while($row = mysqli_fetch_array($result)) {
                
		array_push($response,array("pid"=>$row[0],"name"=>$row[1],"time"=>$row[2],"propic"=>$row[3],"comment"=>$row[4]));}
		echo json_encode(array("server_response"=> $response)); 
		mysqli_close($con);
	
?>