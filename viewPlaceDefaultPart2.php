<?php
	require 'connectDB_2.php';
	$div = $_POST["DIV"];
        $mod = $_POST["MOD"];
	
        if($mod == 'Order by Cost') {
             $sql = " select Place_Name from Places where Division='$div' order by Price desc";
        } 
        else if ($mod == 'Most Popular') {
            $sql = "select Place_Name from Places where Division='$div' order by Rating desc";
        }
        else {
            $sql = "select Place_Name from Places where Division='$div' and Type='$mod' ";
        }
	$result = mysqli_query($con,$sql);
	$response = array();
	while($row = mysqli_fetch_array($result)) {
		array_push($response,array("Place_Name"=>$row[0]));
        }
		echo json_encode(array("server_response"=> $response)); 
		mysqli_close($con);
	
?>