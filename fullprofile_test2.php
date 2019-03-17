<?php
session_start();
require 'connectDB_2.php';
$user_id=$_SESSION['id2'];
	$user_firstname=$_SESSION['firstname2'];
	$user_lastname=$_SESSION['lastname2'];
	$_SESSION['due']==0;
	?>
	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="w3css.css">
<title>Second Phase</title>

<style>
	.td1 {
		padding: 25px;
		font-size:20px;
		padding-left:35px;
	}
	
	.td2 {
		padding-left:120px;	
		border: 1px solid white;
		padding-right:100px;
		color:white;
		padding-top:10px;
		padding-bottom:10px;
		font-weight:bold;
	}

</style>
</head>


	<body style="margin:0px; padding:0px; background-color:#666">
	<img src="ruet.png" class="w3-teal" style="width:82.1% ; height:127px; margin:0px; padding:0px; background-color:teal; background-attachment:fixed;">
	
	<div style="float:right; padding-left:8.4px; background-color:teal; margin:0px;">
	 <a href="#" style=" text-align:center; color:white; text-decoration:none; padding: 30px; font-size:22px; "> <img src="bellicon1.png" style="height: 40px; width:35px; margin-right:5px;margin-top:13px;">  <?php echo "$user_firstname" ?>  </a></li>  </a>
	 
	 <br /> <br />
	 
	 <a href="http://accsectiondemo.site11.com/" style=" text-align:center; color:black; text-decoration:none; padding: 60px; font-size:22px;">  <button style="background-color:#666; color:white; margin-bottom:10px; font-weight:bold"> Log out </button>  </a>
	 
	 </div>
	 
		<div style="margin-left:180px;padding:0px;">
	
	<table style="background-color:black; color:white">
	
	<tr>
	
	<td class="td1" >
	<a href="http://accsectiondemo.site11.com/fullprofile_test.php" style="text-decoration:none; color:white" >Payment</a>
	</td>
	
	<td class="td1">
	<a href="pay.php" style="text-decoration:none; color:white" >Academic Information</a>
	</td>
	
	<td class="td1" style=" background-color:#00F; font-weight:bold">
	<a href="pay.php" style="text-decoration:none; color:white" >Account History</a>
	</td>
	
	<td class="td1">
	<a href="pay.php" style="text-decoration:none; color:white;" >Notices</a>
	</td>
	
	<td class="td1">
	<a href="pay.php" style="text-decoration:none; color:white" > Personal Info</a>
	</td>
	
	
	</tr>
	
	</table>
	<div style="background-color:teal; width:1009px;">
	<table>
	<tr>
	<td class="td2">
	<?php
	$count=0;
	$query="select * from memo";
	$run = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($run)) {
		
		if($count==0) {
			$first = $row['dateTime'];
			$next=$first;
			$_SESSION['date']=$first;
			?>
			
			
				<form action='http://accsectiondemo.site11.com/fpdf/fpdftesting.php' method='GET'>
				<span style="font-size:24px; margin-left:100px">	Payment of </span>
 				<input type="Submit" Name = 'Open' Value = '<?php echo $next ?>' style='font-size:24px;;background-color:teal; color: yellow;  margin-top:10px;  margin-left: 25px ; margin-right:96px;  width: 400px; height:40px'>
				</form>
			
			<?php
		}
		else {
			$next2=$row['dateTime'];
			if($next2==$next){}
			else {
				$next=$next2;
				$_SESSION['date']=$next2;
				?>
				
				<tr>
				<td class="td2">
				<form action='http://accsectiondemo.site11.com/fpdf/fpdftesting.php' method='GET'>
				<span style="font-size:24px; margin-left:100px">	Payment of </span>
 				<input type="Submit" Name = 'Open' Value = '<?php echo $next ?>' style='font-size:24px;;background-color:teal; color: yellow;  margin-top:10px;  margin-left: 25px ; margin-right:96px;  width: 400px; height:40px'>
				</form>
					</td>
					</tr>
				<?php
			}
		}
		$count=$count+1;
	}
	?>
	</td>
	<tr>
	</table>
	</div>
	</body>
</html>