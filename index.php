<?php
ob_start();
session_start();
require 'connectDB_2.php';
?>

<?php
	function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Log in </title>
<style>

.background {
  position: absolute;
  height: 100%;
  width: 100%;
  margin:0px;
  padding:0px;
  z-index:-99;
  background-repeat:no-repeat;
  background-size: 100% 100%;
  background-image:url("tt.jpeg");
}

</style>

</head>

<body style="margin:0px; padding:0px;">

	<div class ="background">
	
	</div>
	
	<div style="float:right; padding-left:8.4px; background-color:teal; margin:0px; padding-bottom:20px">
	 <a href="http://localhost/assignment/test2.html" style=" text-align:center; color:yellow; text-decoration:none; padding: 30px; font-size:24px; font-weight:bold"> <img src="homeicon.png" style="display:inline; height: 40px; width:35px; margin-right:5px;margin-top:13px;">  <?php echo "HOME" ?>  </a></li>  </a>
	 </div>
	
	<div style="position:absolute; margin-top:12%; background-color:transparent; width:45%; height:330px; color:white; margin-left: 26%;">
		<h1 style="font-size: 49px; background-color:teal ;color:white; text-align:center ; padding:5px"> Login Page </h1>
		
		<form method= "post" action="http://accsectiondemo.site11.com" >
		
		<span style="background-color:#666 ;color:white; padding:0.5em; border:0.25em; border-color:#666; height:39px;  font-size:24px; font-weight:bold; margin-bottom:15px"> Account No : </span>
		
		
		<input type="text" name="username2" style="padding:0.6em;border:0.2em solid; font:1.0em 'Montserrat Alternates'; 
		border-color:#666; width:420px; height:25px;background-color:teal ;color:white; font-weight:bold ;margin-bottom:15px"  id="search" placeholder="username" />
		
		<span style="background-color:#666 ;color:white; padding:0.5em; border:0.25em; border-color:#666; height:39px;  font-size:24px; font-weight:bold;"> Password :   </span>
		<input type="password" name="password2" style="padding:0.6em;border:0.2em solid; font:1.0em 'Montserrat Alternates'; border-color:#666; width:442px; height:25px;background-color:teal ;color:white; font-weight:bold"  id="search" placeholder="password" />
		<input type="submit" name="Submit" value="Log in" style="text-align:center; width:30%; padding: 7px; font-weight:bold; font-size:30px; color: white; background-color:#666; margin-left: 33% ; margin-top: 2% "/>
		
		</form>
		
		<h2 style="text-align:center"> Don't Have an account? </h2>
		<a href="http://localhost/assignment/SignupPage.php" style="  margin-left: 38%;color:white; font-size:24px; font-weight:bold"> Sign up here </a>
		
		
	</div>
	
<?php
 if (isset($_POST['username2']) && isset($_POST['password2'])) {
 	$username = $_POST['username2'];
	$password = $_POST['password2'];
	
	
	
	if(!empty ($username) && !empty($password)) {
					$query = "select * from information where Username='$username' and password='$password' ";
                if($result = mysqli_query($con , $query)) {
	
	
	if( mysqli_num_rows($result) ==1) {
		$row = mysqli_fetch_assoc($result);
		$user_id  = $row["Username"];
		$user_firstname = $row["First_Name"];
		$user_lastname = $row["Last_Name"];
		$_SESSION['id2']=$user_id;
				$_SESSION['firstname2']=$user_firstname;
				$_SESSION['lastname2']=$user_lastname;
				$_SESSION['due']=0;
				$_SESSION['cart_money']=0;
				$roll = $row["Roll_Number"];
				$_SESSION['roll2'] = $roll;
				$dept = $row["Department"];
				$_SESSION['dept']=$dept;
				$year = $row["Year"];
				$_SESSION['yr']=$year;
				$semester = $row["Semester"];
				$_SESSION['sem']=$semester;
				$address = $row["Address"];
				$_SESSION['hall'] = $address;
				$query_redirect_to_payment = $row["Save"];
				if($query_redirect_to_payment=='Y') header('Location: http://accsectiondemo.site11.com/paylayout.php');
				else 	header('Location: http://accsectiondemo.site11.com/fullprofile_test.php');
			
				
	}
				}
				else {
					phpAlert("invalid username and password!");
				}
	}
	else {
		echo 'you must fill up username and password';
	}
	
 }
?>
	
</body>
</html>