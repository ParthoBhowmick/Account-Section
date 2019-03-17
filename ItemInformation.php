<?php
	require 'connectDB_2.php';
        
$item = $_POST["ITEM"];
	$sql = "select ki_jinish,jinish_er_dam,jinisher_chehara from JinishPotro where kon_jinish='$item' ";
	$result = mysqli_query($con,$sql);
	$response = array();
	while($row = mysqli_fetch_array($result)) {
               array_push($response,array("item"=> $row[0],"price"=> $row[1],"img"=> $row[2]));}
		echo json_encode(array("server_response"=> $response)); 
		mysqli_close($con);
	
?>