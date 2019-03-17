<?php
	require 'connectDB_2.php';
	$sql = "select * from main_server order by time DESC";
	$result = mysqli_query($con,$sql);
	$response = array();
	while($row = mysqli_fetch_array($result)) {
                
		array_push($response,array("name"=> $row[0],"pro_pic"=> $row[1],"pic"=> $row[4], "status"=>$row[3],"Like"=>$row[6],"time"=>$row[5],"Comment"=>$row[8],"Share"=>$row[7],"postID"=>$row[9],"privacy"=>$row[10]));}
		echo json_encode(array("server_response"=> $response)); 
		mysqli_close($con);
	
?>