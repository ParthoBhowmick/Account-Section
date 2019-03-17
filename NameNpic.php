<?php
	require 'connectDB_2.php';
	$pid = $_POST["pid"];	
        
	$sql = "select name,pro_pic_name from user_info where username='$pid'";
	$result = mysqli_query($con,$sql);
	$response = array();
	while($row = mysqli_fetch_array($result)) {
                
		array_push($response,array("name"=>$row[0],"picname"=>$row[1]));}
		echo json_encode(array("server_response"=> $response)); 
		mysqli_close($con);
	
?>