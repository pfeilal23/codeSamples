<?php
//form validation for createAccount2.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ( !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['userEmail']) && !empty($_POST['phone']) ){
	include('../mysql_connect2.php');
	}



	$problem = FALSE;
	$a=array();
	$firstName=($_POST['firstName']);
	$lastName=($_POST['lastName']);
	$userEmail=($_POST['userEmail']);
	$userPhone=($_POST['phone']);
	$userName=($_POST['userName']);
	$userPwd=($_POST['userPwd']);
	
    if (strlen($_POST['userName'])<1){
        $problem = true;
		array_push($a,"Please enter at least one character for your Username.");
    }
	if (empty($_POST['userEmail'])||(substr_count($_POST['userEmail'],'@')!=1)||(substr_count($_POST['userEmail'],'.')<1)) {
		$problem = TRUE;
		array_push($a,"Please enter your email address in the following format: example@sample.com.");
	}

	if (empty($_POST['userPwd'])) {
		$problem = TRUE;
		array_push($a,"Please enter a password.");
	}
	if (empty($_POST['firstName'])) {
		$problem = TRUE;
		array_push($a,"Please enter your first name.");
	}
	if (empty($_POST['lastName'])) {
		$problem = TRUE;
		array_push($a,"Please enter your last name.");
	}
	if (strlen($_POST['phone'])<10) {
		$problem = TRUE;
		array_push($a,"Please enter your ten digit phone number.");
	}
	
	if (!($_POST['email'])==''){
	$problem = TRUE;
	array_push($a,"You are a spam bot!");
	}
	if (!$problem) {$query = "INSERT INTO users (id, firstName, lastName, userEmail, phone, userName, userPwd) VALUES
				(0, '$firstName','$lastName','$userEmail','$userPhone','$userName','$userPwd')";
				session_start();
				session_start();
	$_SESSION['firstName']=$firstName;
	$_SESSION['lastName']=$lastName;
	$_SESSION['userEmail']=$userEmail;
	$_SESSION['phone']=$userPhone;
	$_SESSION['userName']=$userName;
	$_SESSION['userPwd']=$userPwd;
	$_SESSION['id']=$id;
	setcookie('Samuel', 'Clemens', time()+3600);
	$loggedin = true;
	$emailSubject='Tutor U Academy Account Information';
				$to=$userEmail;
				$body = <<<EOD
Thank you for creating an account with Tutor U Academy! Your account information is as follows:<br>
Username: $userName<br>
Password: $userPwd<br>

EOD;
				$headers .="Content-type:text/html\r\n";
				$success= mail($to, $emailSubject, $body, $headers);
		if($r=mysql_query($query,$dbc)) {
			header("location:videos.php");
		} else {
			print mysql_error($dbc);}
        mysql_close($dbc);
	} else {
		include('templates/header.html');
	print'<div class="col-md-2"></div>
<div class="col-md-8">';
foreach($a as $key => $value)
{
  echo $value.'<br><br>';
}
	print '<p class="error">Please <button class="buttons" onclick="goBack()">Go Back</button> and try again!</p></div>
	<div class="col-md-2"></div>';
	include('templates/footer.html');

	}
	
 }	

?>