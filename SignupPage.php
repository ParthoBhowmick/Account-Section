<?php 
session_start();
ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form</title>
</head>

<body>
<?php
	require 'connectDB.php';
?>

<?php


	if (!isset($POST['txt'])) {
    $_SESSION ['txt'] = rand(1000,9999);
}	


/*
	if(isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['phnnum']) && isset($_POST['email']) && isset($_POST['id']) && isset($_POST['pass']) && isset($_POST['passAgain']) &isset($_POST['ext']) ) {
		$first_name = $_POST['firstname'];
		$mid_name = $_POST['midname'];
		$last_name = $_POST['lastname'];
		$phn_num = $_POST['phnnum'];
		$mail = $_POST['email'];
		$uni_id = $_POST['id'];
		$passi = $_POST['pass'];
		$passr = $_POST['passAgain'];
		$acc_ext = $_POST['ext'];
		
		if(empty($first_name) ) {
			$first_name =   "Warning : Name Required";
		}
		if(empty($last_name)) {
			$last_name =   "Warning : Name Required";
		}
		
		if(empty($phn_num)) {
			$phn_num = " Warning : Contact Required";
		}
		
		if(empty($uni_id) ) {
			$uni_id =  "Warning : ID Required" ; 
		}
		
		if(empty($passi) || empty($passr) )  {
			echo  "Warning : Password Required" .  "<br>"; 
		}
		
		if(empty($acc_ext) ) {
			$acc_ext =   "Warning : Extension Required" ; 
		}
		
		if (!empty($passi) && !empty($passr) && $passi != $passr) {
				echo "Warning : Password field empty or doesn't match". "<Br>";	
		}
		
	/*	 if ($_SESSION ['secure'] == $_POST['secure']) {
        		$_SESSION ['secure'] = rand(1000,9999);
    	}
		*/
 /*
		
		if(!empty($first_name) && !empty($last_name)  && !empty($phn_num) && !empty($mail) && !empty($uni_id) && !empty($passi) && !empty($passr) && !empty($acc_ext)) {
			
			if(!strpos ($first_name,"Warning") && !strpos($last_name,"Warning") && !strpos($phn_num,"Warning") && !strpos($uni_id,"Warning") && !strpos($acc_ext,"Warning")) {
				
				if($passi == $passr) { //&& 	$_SESSION ['secure'] == $_POST['secure'])  
						$_SESSION['firstname']=$first_name;
		  				$_SESSION['midname']=$mid_name ;
		  				$_SESSION['lastname'] =$last_name ;
		  				$_SESSION['phnnum']  = $phn_num;
		  				$_SESSION['email'] = $mail;
		  				$_SESSION['id'] = $uni_id;
		  				$_SESSION['pass'] = $passi;
		 				$_SESSION['passAgain'] = $passr;
		 				$_SESSION['ext'] = $acc_ext;
						 header('Location:AccSection.php');
				}
				
			}

			
		}
		
	*/	
	
	if(isset($_SESSION['set'])) {
		$first_name = $_SESSION['firstname'];
		$mid_name = $_SESSION['midname'];
		$last_name = $_SESSION['lastname'];
		$phn_num = $_SESSION['phnnum'];
		$mail = $_SESSION['email'];
		$uni_id = $_SESSION['id'];
		$acc_ext = $_SESSION['ext'];
	}
	?>

<h1 style="text-align:center;"> Registration Form </h1>

<form method="post" action="http://localhost/assignment/AccSection.php">
First Name : 
<input type="text" style="font-weight:bold"   placeholder="text only" name="firstname" value="<?php echo $first_name ?>"/>
<br /> <br />
Mid  Name : 
<input type="text" style=" font-weight:bold"  placeholder="text only" name="midname" value="<?php echo $mid_name ?>"/>
<br /> <br />
Last Name : 
<input type="text" style=" font-weight:bold"  placeholder="text only" name="lastname" value="<?php echo $last_name ?>"/>
<br /><br /><br />

Contact No: <input type="text" style=" font-weight:bold"  placeholder="phone number" name="phnnum" value="<?php echo $phn_num ?>" />
<br /><br />
Email : <input type="text"  style=" font-weight:bold"  placeholder="abc@mail.com" name="email" value="<?php echo $mail ?>"/>
<br /> <br />
Roll / Employee id :  <input type="text" style=" font-weight:bold"  placeholder="id number" name="id" value="<?php echo $uni_id ?>"/>
<br /> <br />
Acc Extension : <input type="text" style="font-weight:bold"  placeholder="a digit between 0~9" name="ext" value="<?php echo $acc_ext ?>"/>
<br /> <br />
Password : <input type="password" style=" font-weight:bold" name="pass" placeholder="give a strong password"/>
<br /> <br />
Retype Password : <input type="password" style= " font-weight: bold" name="passAgain" placeholder="password again" /> 
<br /> <br /> 

<img src = "gen2.php"/>
<br />
Type the code of the captcha  :  <input type="text" style= " font-weight: bold" name="txt" placeholder="code of captcha" /> 
<br /> <br /> 


<input type="submit" value="Sign up"/> 
</form>

</body>
</html>