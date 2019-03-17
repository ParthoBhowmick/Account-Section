<?php
	require 'connectDB_2.php';
	$div = $_POST["DIV"];
	$sql = "select Place_Name from Places where Division='$div'";
	$result = mysqli_query($con,$sql);
	$response = array();
	while($row = mysqli_fetch_array($result)) {
		array_push($response,array("Place_Name"=>$row[0]));
        }
		echo json_encode(array("server_response"=> $response)); 
		mysqli_close($con);
	
?>