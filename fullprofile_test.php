<?php
session_start();
$_SESSION['amma']=0;
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

<script type="text/javascript">
function showcart(str) {
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
		else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cart").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","http://accsectiondemo.site11.com/loading.php?q="+str,true);
        xmlhttp.send();
}

</script>

</head>


<?php
	require 'connectDB_2.php';
	$user_id=$_SESSION['id2'];
	$user_firstname=$_SESSION['firstname2'];
	$user_lastname=$_SESSION['lastname2'];
	$_SESSION['ajaxtot']=0;
	$_SESSION['total'] = 0;
	
	function create_table($query_par) {
		require 'connectDB_2.php';
		$query2 = "select * from forajax where feeid='$query_par'";
			?>
			<br />
			<table style="border: 1px solid white;	padding:7px; margin-left:55px; font-size:20px">
			<tr>
			<th style="border: 1px solid white;	padding:3px; border-collapse:separate"> Type </th>
			<th style="border: 1px solid white;	padding:3px; border-collapse:separate"> Amount </th>
			</tr>
			<?php
			
			if($query_run2 = mysqli_query($con,$query2)) {
			while($row = mysqli_fetch_assoc($query_run2)) {
			//assign $row as an asscociative array, each row acts like associative array, and column acts like row's key 
			?>
			<tr>
				<td style="border: 1px solid white;	padding:3px; border-collapse:separate">
				<?php
				if($row['isselect']==0) {
					$_SESSION[$row['feename']]='not clicked';
				?>
					<Input type = 'checkbox' Name = "<?php echo $row['feename']  ?>" value="<?php echo $row['feename']  ?>" onclick='showcart(this.value);'>
				<?php
				}
				
				else {
				?>
					<Input type = 'checkbox' Name = '<?php $row['feename']  ?>' disabled >
				<?php
				}
				$Topic = $row['feename'];
				echo $Topic;
				?>
				</td>
				<td style="border: 1px solid white;	padding:3px; border-collapse:separate">
				<?php
				$Amount =$row['feeamount'];
				echo $Amount;
				?>
				</td>
				</tr>
				<?php
				
			}
			}
		?>
		</table>
		<Br />
		<?php
		return;
	}
	
	?>

<body style="margin:0px; padding:0px; background-color:#666">
	<img src="ruet.png" class="w3-teal" style="width:82.1% ; height:127px; margin:0px; padding:0px; background-color:teal; background-attachment:fixed;">
	
	<div style="float:right; padding-left:8.4px; background-color:teal; margin:0px;">
	 <a href="#" style=" text-align:center; color:white; text-decoration:none; padding: 30px; font-size:22px; "> <img src="bellicon1.png" style="height: 40px; width:35px; margin-right:5px;margin-top:13px;">  <?php echo "$user_firstname" ?>  </a></li>  </a>
	 
	 <br /> <br />
	 
	 <a href="http://accsectiondemo.site11.com" style=" text-align:center; color:black; text-decoration:none; padding: 60px; font-size:22px;">  <button style="background-color:#666; color:white; margin-bottom:10px; font-weight:bold"> Log out </button>  </a>
	 
	 </div>
	 
		<div style="margin-left:180px;padding:0px;">
	
	<table style="background-color:black; color:white">
	
	<tr>
	
	<td class="td1" style=" background-color:#00F; font-weight:bold">
	<a href="pay.php" style="text-decoration:none; color:white" >Payment</a>
	</td>
	
	<td class="td1">
	<a href="pay.php" style="text-decoration:none; color:white" >Academic Information</a>
	</td>
	
	<td class="td1">
	<a href="http://accsectiondemo.site11.com/fullprofile_test2.php" style="text-decoration:none; color:white" >Account History</a>
	</td>
	
	<td class="td1">
	<a href="pay.php" style="text-decoration:none; color:white;" >Notices</a>
	</td>
	
	<td class="td1">
	<a href="pay.php" style="text-decoration:none; color:white" > Personal Info</a>
	</td>
	
	
	</tr>
	
	</table>
	
	<div style="background-color:teal; width:1002px;">
	
	<table class="t2">
	<tr class="tr2">
	<td class="td2" >Dues</td>
	<td class="td2" style="padding-left:180px;padding-right:160px;">Payment</td>
	<td class="td2" style="padding-left:130px;padding-right:148px;">Cart</td>
	</tr>
	<tr>
	<td style="border: 1px solid white;width:220px;color:white;padding-left:7px;">
	<p style=" font-weight:bold; text-decoration:underline; font-size:24px">Select a semister</p>
	<form aciton="http://accsectiondemo.site11.com/fullprofile.php" method="GET">
	<select name="action">
	<option value="1" >First Semester</option>
	<option value="2">Second Semester</option>
	<option value="3"> Third Semester </option>
	<option value="4" >Fourth Semester</option>
	<option value="5">Fifth Semester</option>
	<option value="6">Sixth Semester </option>
	<option value="7" >Seventh Semester</option>
	<option value="8">Eighth Semester</option>
	</select>
	<br /><br />
	<input type="submit"  name="submit"/>
	</form>
	<br />
	
	<?php
	require 'connectDB_2.php';
	
	$_SESSION['total'] = 0;
	$user_id=$_SESSION['id2'];
	if(isset($_GET['action']) || $_SESSION['due']==1) {
		$_SESSION['due']=1;
		$select1 = $_GET['action'] ;
	if($select1=='1') {$year='1st'; $semester='Odd';}
	else if($select1=='2') {$year='1st'; $semester='Even';}
	else if($select1=='3') {$year='2nd'; $semester='Odd';}
	else if($select1=='4') {$year='2nd'; $semester='Even';}
	else if($select1=='5') {$year='3rd'; $semester='Odd';}
	else if($select1=='6') {$year='3rd'; $semester='Even';}
	else if($select1=='7') {$year='4th'; $semester='Odd';}
	else if($select1=='8') {$year='4th'; $semester='Even';}
		
		echo "<h2 style='text-decoration:underline; font-weight:bold'>Pending Payment</h2>";
		
		$query2 = "select * from payment where username = '$user_id' and  year = '$year' and semester = '$semester'";
		$_SESSION['yearpay']=$year;
		$_SESSION['sempay']=$semester;
		echo "<h4 style='font-style:italic; color:yellow'><b>".$year. " year " . $semester . " semester</b></h4>";
		if($query_run = mysqli_query($con,$query2)) {
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows ==0) {
				echo "INVALID SELECTION";
			}
			else if($query_num_rows==1) {
				$row = mysqli_fetch_assoc($query_run);
				$cr = $row["course_reg"];
				$_SESSION['cr'] = $cr;
				
				if ($cr=='N') {
					echo "<br> <li><b> Course Registration Fee  </b> </li><Br>";
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 0 where feename = 'Course Fee'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);
				}
				
				else {
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 1 where feename = 'Course Fee'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);	
				}
				
				$sf = $row["semester_fee"];
				$_SESSION['sf'] = $sf;
				if ($sf=='N') {
					echo "<li><b>Semester Fee  </b> </li><Br>";
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 0 where feename = 'Semester Fee'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);
				}
				
				else {
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 1 where feename = 'Semester Fee'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);	
				}
				
				$sof = $row["society_fee"];
				$_SESSION['sof'] = $sof;
				if ($sof=='N') {
					echo "<li><b> Departmental Society Fee  </b> </li><Br>";
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 0 where feename = 'Society Fee'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);
				}
				
				else {
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 1 where feename = 'Society Fee'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);	
				}
				
				$hc = $row["hall_charge"];
				$_SESSION['hc'] = $hc;
				if ($hc=='N') {
					echo "<li><b> Hall Charge Fee  </b> </li><Br>";
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 0 where feename = 'Hall Charge'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);
				}
				
				else {
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 1 where feename = 'Hall Charge'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);	
				}
				
				$xf = $row["xm_fee"];
				$_SESSION['xf'] = $xf;
				if ($xf=='N') {
					echo "<li><b> Exam Fee  </b> </li><Br>";
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 0 where feename = 'Exam Fee'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);
				}
				
				else {
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 1 where feename = 'Exam Fee'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);	
				}
				
				
				
				$fc = $row["Farewell_Charge"];
				$_SESSION['fc'] = $fc;
				if ($fc=='N') {
					echo "<li><b> Farewell Charge </b> </li><Br>";
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 0 where feename = 'Farewell'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);
				}
				
				else {
					$queryForSetPayableitemCheckbox = "update forajax set isselect = 1 where feename = 'Farewell'";
					mysqli_query($con,$queryForSetPayableitemCheckbox);	
				}
				
				if($sf =='Y' && $xf=='Y' && $cr=='Y' && $sof=='Y' && $hc=='Y' && $fc=='Y') {
					echo "All fees are PAID";
				}
				
			}
		}
	}
?>

	
	</td>
	<td style="border: 1px solid white;color:white;width:418px;padding-left:7px;">
	<fieldset>
	<legend>
	<p style="font-size:18px">Choose account</p>
	</legend>
	<form aciton="http://accsectiondemo.site11.com/fullprofile.php" method="post">
	<select name="action2">
	<option value="vc" >VC account</option>
	<option value="hall"><?php echo $_SESSION['hall']; ?> Account</option>
	<option value="dept"> <?php echo $_SESSION['dept']; ?>  Society</option>
	</select>
	</fieldset>
	<br />
	<input type="submit"  name="submit"/>
	</form>
<br/>
<hr />
	<?php
	if( isset($_POST['action2']) ) {
		$select2 = $_POST['action2'] ; 
		switch ($select2) {
        case 'vc': 
		create_table('1');
		break;
		case 'hall' :
		create_table('2');
		break;
		case 'dept' :
		create_table('3');
		break;
		default:
		break;
		}
	}
	?>
	<a href="http://accsectiondemo.site11.com/paylayout.php"><button style=" background-color:yellow; color:teal; font-size:18px; font-weight:bold; margin-left:120px; border:2px solid teal">Done Payment</button></a>
	<br /><br />
	
	<td id="cart" style="border: 1px solid white;width:315px;color:white;padding:7px;">
	<?php
	if($_SESSION['cart_money']==0) {
		echo "<b style='color:yellow'>You don't select any payment yet</b>";
	}
	else if($_SESSION['amma']==0) {
		$total=0;
		$query4 = "select * from  cart";
		?>
		<table style="border: 1px solid white;	padding:7px; margin-left:5px; font-size:20px; color:yellow">
		<tr>
			<th style="border: 1px solid white;	padding:7px; border-collapse:separate"> Type </th>
			<th style="border: 1px solid white;	padding:7px; border-collapse:separate"> Amount </th>
		</tr>
		<?php
	
	if ($query_run=mysqli_query($con,$query4)) {
			while($row = mysqli_fetch_assoc($query_run)) {
			//assign $row as an asscociative array, each row acts like associative array, and column acts like row's key 
				?>
				<tr>
				<td style="border: 1px solid white;	padding:7px; border-collapse:separate">
				<?php
				$Topic = $row['feename'];
				$sem = $row['semester'];
				$Topic=$Topic."  ".$sem;
				echo $Topic;
				?>
				</td>
				<td style="border: 1px solid white;	padding:7px; border-collapse:separate">
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
		<td style="border: 1px solid white;	padding:7px; border-collapse:separate">Total</td>
		<td style="border: 1px solid white;	padding:7px; border-collapse:separate">
		<?php
		echo $total . "Tk";
		?>
		</td>
		</tr>
		</table>
		<?php
	}
	?>
	<br />
	
	</td>
	</tr>
	</table>
	</div>
	</div>
	
</body>
</html>