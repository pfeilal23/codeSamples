<?php
//form validation for mainLogin.php
ob_start();

// Connect to server and select databse.
include('../mysql_connect2.php');

// Define $userName and $userPwd
$userName=$_POST['userName'];
$userPwd=$_POST['userPwd'];
$loggedin = false;

$sql="SELECT * FROM users WHERE userName='$userName' and userPwd='$userPwd'";

$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $userName and $userPwd, table row must be 1 row

if($count==1){
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
	header("location:videos.php");
}
else {
include('templates/header.html');
echo '
<div class="col-md-2"></div>
<div class="col-md-8">
Wrong username or password
<form method="post" action="checkLogin.php">
Username: <input name="userName" type="text" id="userName">
Password: <input name="userPwd" type="password" id="userPwd"><input type="submit" name="Submit" value="Login">
<a class="buttons" href="createAccount.php">Create an Account</a>
</form>
</div>
<div class="col-md-2"></div>
';
include('templates/footer.html');
}

ob_end_flush();

?>


