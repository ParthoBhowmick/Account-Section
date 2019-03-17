<?php
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Bar</title>


</head>

<style>

.visa {
height:230px;
width:500px;
background-image:url(visa.jpg);
background-position:center;
z-index:-99;
}

.master {
height:230px;
width:650px;
background-image:url(master.jpg);
background-position:center;
z-index:-99;
}

.ria {
height:230px;
width:500px;
background-image:url(ria.jpg);
background-position:center;
z-index:-99;
}

.ae {
height:230px;
width:500px;
background-image:url(ae.jpg);
background-position:center;
z-index:-99;
}




.vertical {
	margin:0px;
	padding:0px;
	height:100%;
	margin-left:500px;
	position:fixed;
	padding:15px;
}

.sidebar {
	margin:0px;
	width: 450px;	
	background-color : #333;
	border: 1px solid #FFF;
	overflow:auto;
	float:left;
	color: white;
	padding:10px;
	font-size:20px;
}

table,th,td {
		border: 1px solid white;
		border-collapse: separate;
	}
	th,td {
		padding: 15px;
	}
	table {
		border-spacing : 5px;
	}


</style>

<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>


<div class="sidebar">

<?php	
	require 'connectDB_2.php';
	$_SESSION['due']==0;
	$user_id=$_SESSION['id2'];
	$user_firstname=$_SESSION['firstname2'];
	$user_lastname=$_SESSION['lastname2'];
	$user_roll = $_SESSION['roll2'];
	$user_dept = $_SESSION['dept'];
	$user_yr =$_SESSION['yr'];
	$user_sem = $_SESSION['sem'];
	$total = 0;
	echo "<span style='font-size: 24px; font-weight: bold'> Personal Details </span><br><br>";
	echo "Name : " . $user_firstname . "  " . $user_lastname."<Br>"."Department : " .  $user_dept . "<br>Year : " . $user_yr . "<br>Semester : " .  $user_sem . "<br>Roll : " . $user_roll . "<br><br>";
	
	echo "<h3> Payment Details </h3>";
	
	?>
				<table>
				<tr>
			<th> Type </th>
			<th> Amount </th>
			</tr>
				<?php
	
	$query = "select * from cart";
	if ($query_run=mysqli_query($con,$query)) {
			while($row = mysqli_fetch_assoc($query_run)) {
			//assign $row as an asscociative array, each row acts like associative array, and column acts like row's key 
				?>
				<tr>
				<td>
				<?php
				$Topic = $row['feename'];
				$sem = $row['semester'];
				$Topic=$Topic." (".$sem.")";
				echo $Topic;
				?>
				</td>
				<td>
				<?php
				$Amount =$row['feeamount'];
				echo $Amount;
				$total=$total+$Amount;
				?>
				</td>
				</tr>
				<?php
				
			}
		}
		?>
		<tr>
		<td>Total</td>
		<td>
		<?php
		echo $total . "Tk";
		?>
		</td>
		</tr>
		</table>
		<br />
		<br />

</div>

<div class="vertical" style=" font-size:18px">
	<h3>How would you like to pay?</h3>
	<table>
	<tr>
	
	<td>
	<button id="id1"  style=" background:none;border:none" onclick = "ver.className = 'visa'"> <img src="visa.jpg"  style="height:80; width:120px" />  </button>
	</td>
	
	<td>
	<button id="id2" style=" background:none;border:none" onclick = "ver.className = 'master'"> <img src="master.jpg" style="height:80; width:120px" /> </button>
	</td>
	
	<td>
	<button id="id3" style=" background:none;border:none" onclick = "ver.className = 'ria'"> <img src="ria.jpg" style="height:80; width:120px" /> </button>
	</td>
	
	<td>
	<button id="id4"  style=" background:none;border:none" onclick = "ver.className = 'ae'"> <img src="ae.jpg"  style="height:80; width:120px" /> </button>
	</td>
	
	</tr>
	</table>
	
	<br />
	
	<form method="post" action="http://accsectiondemo.site11.com/paylayout.php">
	<div id="ver">
	<span style="font-size=16px;color:yellow; background-color:#009; font-weight:bold;">Cardholder name</span> <br />
	<input type="text" style="font-weight:bold"   placeholder="text only" name="holdername" value="<?php echo $user_firstname . "  " . $user_lastname ?>"/> <br /><br />
	<span style="font-size=16px;color:yellow; background-color:#009; font-weight:bold;"> Debit/Credit Card number </span><br />
	<input type="text" style="font-weight:bold"   placeholder="card number" name="cardNumber"/>  <br /><br />
	<span style="font-size=16px;color:yellow; background-color:#009; font-weight:bold;"> Expiration Date </span> <br />
	<select name="action">
	
	<option value="month" >Month</option>
	<option value="January" >January</option>
	<option value="February" > February</option>
	<option value="March" >March</option>
	<option value="April" >April</option>
	<option value="May" >May</option>
	<option value="June" > June</option>
	<option value="July" >July</option>
	<option value="August" >August</option>
	<option value="September" >September</option>
	<option value="October" > October</option>
	<option value="November" >November</option>
	<option value="December" >December</option>
	</select>
	<select name="action2">
	<option value="year" >Year</option>
	<?php
	for($i=2017;$i<=2050;$i++) {
	?>
		<option value="<?php echo $i; ?>" > <?php echo $i; ?> </option>
	<?php
	}
	?>
	</select>
	<br /><br />
	<span style="font-size=16px;color:yellow; background-color:#009; font-weight:bold;">
	Security Code <br /> </span>
	<input type="password" style="font-weight:bold"   placeholder="security" name="cardPassword" />  <br />
	</div>
	
	
	<P></P>
	
	<Input type = 'Submit' Name = 'save' Value = 'Save' style='display:inline; width:220px; height:50px; background-color:teal ; color:yellow; font-size:30px; font-weight:bold;'>
	<Input type = 'Submit' Name = 'pay' Value = 'Pay' style='display:inline; margin-left:120px; width:220px; height:50px; background-color:#090 ; color:white; font-size:30px; font-weight:bold;'>
	
	</form>
	<br />
		<form aciton='http://accsectiondemo.site11.com/paylayout.php' method='post'> 
			<Input type = 'Submit' Name = 'discard' Value = 'Discard' style=' margin-left:170px; width:220px; height:50px; background-color:red ; color:black; font-size:30px; font-weight:bold;'>
 			</form>
			
		<?php
			
			if(isset($_POST['pay'])) {
				
				if(isset($_POST['cardNumber'])  && isset($_POST['action'] ) && isset($_POST['action2']) && isset($_POST['cardPassword']) ) {
				$user_id=$_POST['cardNumber'];
				$year =  $_POST['action2'];
				$month = $_POST['action'];
				$expiration = $month." ".$year;
				$query_user_account_balance = "select * from bank_account where card_number = '$user_id'";
				//$run_user_account_balance = mysqli_query($con,$query_user_account_balance);
				if($run_user_account_balance = mysqli_query($con,$query_user_account_balance)) {
					if(mysqli_num_rows($run_user_account_balance)==1) {
				$row = mysqli_fetch_assoc($run_user_account_balance);
				$balance = $row["balance"];
				$pass = $row["security_code"];
				$expire = $row["expired_date"];
					}
				}
				if($balance>=$_SESSION['cart_money'] && $pass==$_POST['cardPassword'] && $expiration==$expire) {
				$query_select_cart = "select * from cart";
				$run_select_cart=mysqli_query($con,$query_select_cart);
				while ($row = mysqli_fetch_assoc($run_select_cart)) {
					$fname = $row['feename'];
					$famount=$row['feeamount'];
					$semester = $row['semester'];
					$topic = $fname . "  (" . $semester . ")"; 
					$query_retrieve_accid = "select feeid from forajax where feename = '$fname' ";
					if($run_retrieve_accid = mysqli_query($con,$query_retrieve_accid)) {
						$row = mysqli_fetch_assoc($run_retrieve_accid);
						$feeid = $row["feeid"];
					}
					$query_retrieve_account = "select Account_name,Account_number from accounts where accID = '$feeid'";
					if($run_retrieve_account = mysqli_query($con,$query_retrieve_account)) {
						$row = mysqli_fetch_assoc($run_retrieve_account);
						$accname = $row["Account_name"];
						$accnum = $row["Account_number"];
					}
					$date = date('d-m-Y H:i:s');
					$date=strtotime("+6 Hours");
					$date=date("d-m-Y h:i:sa", $date);
					$_SESSION['date']=$date;
					$query_insert_memo = "insert into memo values ('$topic','$famount','$accname','$accnum','$date')";
					mysqli_query($con,$query_insert_memo);
					$query_update_accounts_balance = "update accounts set money = money+ $famount where accID = '$feeid'";
					mysqli_query($con,$query_update_accounts_balance);
					$query_update_user_balance = "update bank_account set balance = balance-$famount where card_number = '$user_id'";
					mysqli_query($con,$query_update_user_balance);
					$_SESSION['cart_money'] = 0;
					$query_delete_cart = "delete from cart where 1=1";
					mysqli_query($con,$query_delete_cart);
					$query_discarding_paymentTab = "update payment set $pseudofee='N' where year='$year' and semester='$semester'";
				mysqli_query($con,$query_discarding_paymentTab);
				phpAlert("Successfully Paid");
				
				header('Location: http://accsectiondemo.site11.com/fpdf/fpdftesting_ano.php');
				}
			}
				else {
					$query_user_account_balance = "select * from bank_account where card_number = '$user_id'";
					if($run_user_account_balance = mysqli_query($con,$query_user_account_balance)) {
					$query_num_rows = mysqli_num_rows($run_user_account_balance);}
					if($query_num_rows ==0 || $expiration!=$expire || $pass==$_POST['cardPassword']) {
						phpAlert("Invalid card!!");
					}
					else {
					$row = mysqli_fetch_assoc($run_user_account_balance);
					$balance = $row["balance"];
					if($balance<$_SESSION['cart_money']) {
						phpAlert("Insufficiant Balance!!");
					}
					}
				}
			
			}
			}
			
			else if(isset($_POST['discard'])) {
				$query = "update information set Save='' where Username = '$user_id'";
				mysqli_query($con,$query); 
				$query2 = "update information set Amount=0 where Username = '$user_id'";
				mysqli_query($con,$query2);
				$query_retreive_cart = "select * from cart";
				$query_run_retrieve_cart=mysqli_query($con,$query_retreive_cart);
				while($row = mysqli_fetch_assoc($query_run_retrieve_cart)) {
					$fee = $row['feename'];
				$sem = $row['semester'];
				$year = $sem[0].$sem[1].$sem[2];
				$semester = $sem[3].$sem[4].$sem[5];
				$query_for_pseudoFeename = "select pseudoFeename from forajax where feename='$fee' ";
				if($query_run_pseudofee=mysqli_query($con,$query_for_pseudoFeename)) {
					$row = mysqli_fetch_assoc($query_run_pseudofee);
					$pseudofee = $row["pseudoFeename"];
				}
				$query_discarding_paymentTab = "update payment set $pseudofee='N' where year='$year' and semester='$semester'";
				mysqli_query($con,$query_discarding_paymentTab);
				
				}
				phpAlert( "DISCARDED!!");
				$query_delete_cart = "delete from cart where 1=1";
				if(mysqli_query($con,$query_delete_cart)) 
				header('http://accsectiondemo.site11.com/fullprofile_test.php?action=1&submit=Submit');
			}
			
			else if(isset($_POST['save'])) {
				$query = "update information set Save='Y' where Username = '$user_id'";
				$query2 = "update information set Amount='$total' where Username = '$user_id'";
				if ($query_run=mysqli_query($con,$query) && $query_run2=mysqli_query($con,$query2)) {
					phpAlert("Saved!");
				}
			}
		?>

	<hr />
</div>
<body>
</body>
</html>