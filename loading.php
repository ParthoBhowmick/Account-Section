<?php
session_start();
require 'connectDB_2.php';
?>
<html>
<head>
</head>
<body>
<?php
$yr = $_SESSION['yearpay'];
$sem = $_SESSION['sempay'];
$get = $_GET['q'];

 if($get!="") {
$_SESSION['amma']=1;
$total=0;

$query2 = "select * from forajax where feename='$get'";
		if($query_run = mysqli_query($con,$query2)) {
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows ==1) {
				$row = mysqli_fetch_assoc($query_run);
				$amount =  $row["feeamount"];
				$retrieve_feename_toUpdate = $row["pseudoFeename"];
				$query_set = "update payment set $retrieve_feename_toUpdate='Y'  where year='$yr' and semester='$sem'";
				mysqli_query($con,$query_set);
				$query_set3 = "update forajax set isselect=1 where feename='$get'";
				mysqli_query($con,$query_set3); 
			}
		}
if($_SESSION[$get]=='not clicked') {
	$_SESSION[$get]="clicked";
$query3 = "insert into cart values ('$get','$amount','$yr$sem')";
if($query_run = mysqli_query($con,$query3)) {
		$query4 = "select * from  cart";
		?>
		<table style="border: 1px solid yellow;	padding:7px; margin-left:5px; font-size:20px; color:yellow">
				<tr >
			<th style="border: 1px solid yellow;	padding:7px; border-collapse:separate"> Type </th>
			<th style="border: 1px solid yellow;	padding:7px; border-collapse:separate"> Amount </th>
			</tr>
				<?php
	
	if ($query_run=mysqli_query($con,$query4)) {
			while($row = mysqli_fetch_assoc($query_run)) {
			//assign $row as an asscociative array, each row acts like associative array, and column acts like row's key 
				?>
				<tr >
				<td style="border: 1px solid yellow;	padding:7px; border-collapse:separate">
				<?php
				$Topic = $row['feename'];
				$sem = $row['semester'];
				$Topic=$Topic."  ".$sem;
				echo $Topic;
				?>
				</td>
				<td style="border: 1px solid yellow;	padding:7px; border-collapse:separate">
				<?php
				$Amount =$row['feeamount'];
				$total=$total+$Amount;
				echo $Amount;
				?>
				</td>
				</tr>
				<?php
				
			}
		}
		?>
		<tr>
		<td style="border: 1px solid yellow;	padding:7px; border-collapse:separate">Total</td>
		<td style="border: 1px solid yellow;	padding:7px; border-collapse:separate">
		<?php
		echo $total . "Tk";
		?>
		</td>
		</tr>
		</table>
		<?php
		$_SESSION['cart_money']=$total;
}
}
	else {
		$query2 = "delete from cart where feename='$get' and semester='$yr$sem'";
		$_SESSION[$get]="not clicked";
		if($query_run = mysqli_query($con,$query2)) {
			$query_set = "update forajax set isselect=0 where feename='$get'";
			$query_run = mysqli_query($con,$query_set);
				
			$query2 = "select * from forajax where feename='$get'";
			if ($query_run2 = mysqli_query($con,$query2)) {	
				$row = mysqli_fetch_assoc($query_run2);
				$retrieve_feename_toUpdate = $row['pseudoFeename'];
				$query_set2 = "update payment set $retrieve_feename_toUpdate='N'  where year='$yr' and semester='$sem'";
				mysqli_query($con,$query_set2);
			}
			 $total=0;
			 $query4 = "select * from  cart";
			 $query_run=mysqli_query($con,$query4);
			 $query_num_rows = mysqli_num_rows($query_run);
			 if($query_num_rows==0) {
			 	echo "<b style='color:yellow'>You don't select any payment yet</b>";
				$_SESSION['cart_money']=0;
			 }
			else {
		?>
		<table style="border: 1px solid yellow;	padding:7px; margin-left:5px; font-size:20px; color:yellow">
				<tr >
			<th style="border: 1px solid yellow;	padding:7px; border-collapse:separate"> Type </th>
			<th style="border: 1px solid yellow;	padding:7px; border-collapse:separate"> Amount </th>
			</tr>
				<?php
	
	if ($query_run=mysqli_query($con,$query4)) {
			while($row = mysqli_fetch_assoc($query_run)) {
			//assign $row as an asscociative array, each row acts like associative array, and column acts like row's key 
				?>
				<tr >
				<td style="border: 1px solid yellow;	padding:7px; border-collapse:separate">
				<?php
				$Topic = $row['feename'];
				$sem = $row['semester'];
				$Topic=$Topic."  ".$sem;
				echo $Topic;
				?>
				</td>
				<td style="border: 1px solid yellow;	padding:7px; border-collapse:separate">
				<?php
				$Amount =$row['feeamount'];
				$total=$total+$Amount;
				echo $Amount;
				?>
				</td>
				</tr>
				<?php
				
			}
		}
		?>
		<tr>
		<td style="border: 1px solid yellow;	padding:7px; border-collapse:separate">Total</td>
		<td style="border: 1px solid yellow;	padding:7px; border-collapse:separate">
		<?php
		echo $total . "Tk";
		?>
		</td>
		</tr>
		</table>
		<?php
		$_SESSION['cart_money']=$total;
			}
		}
	}
}


?>		
</body>
</html>