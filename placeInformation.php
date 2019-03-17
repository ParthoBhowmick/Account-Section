<?php
	require 'connectDB_2.php';
        $place = $_POST["PLACE"];
       
	$sql = "select * from Place_Information where pname='$place' ";
	$result = mysqli_query($con,$sql);
	$response = array();
	while($row = mysqli_fetch_array($result)) {
               array_push($response,array("pdescription"=> $row[1],"vistime1"=> $row[2],"vistime2"=> $row[3],"vistime3"=> $row[4],"rating"=> $row[5],"picname1"=> $row[6],"picname2"=> $row[7],"picname3"=> $row[8],"picname4"=> $row[9],"piccap1"=> $row[10],"piccap2"=> $row[11],"piccap3"=> $row[12],"piccap4"=> $row[13],"hotelname1"=> $row[14],"hotelname2"=> $row[15],"hotelname3"=> $row[16],"hoteladd1"=> $row[17],"hoteladd2"=> $row[18],"hoteladd3"=> $row[19],"police"=> $row[20],"hospital"=> $row[21]));}
		echo json_encode(array("server_response"=> $response)); 
		mysqli_close($con);
	
?>