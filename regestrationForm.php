<?php
include('templates/header.html');
?>
</head>

<body>

<?php

print '<h2>Registration Form</h2>
    <p>Create an account to post comments and blogs.</p>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//form validation for form.html
	$problem = FALSE;
	
    if (strlen($_POST['first_name'])<1){
        $problem = true;
        print '<p class="error">Please enter at least one character for your first name.</p>';
    }
	
	if (empty($_POST['last_name'])) {
		$problem = TRUE;
		print '<p class="error">Please enter your last name.</p>';
	}
    if (strlen($_POST['last_name'])<2){
        $problem = true;
        print '<p class="error">Please enter at least two characters for your last name.</p>';
    }
    if (empty($_POST['month'])){
        $problem = TRUE;
        print '<p class="error">Please enter your birth month.</p>';
    }
    if (empty($_POST['day'])){
        $problem = TRUE;
        print '<p class="error">Please enter your birth day.</p>';
    }    
    if (empty($_POST['year'])){
        $problem = TRUE;
        print '<p class="error">Please enter your birth year.</p>';
    }
    if (!is_numeric($_POST['year'])){
        $problem = TRUE;
        print '<p class="error">Please enter your four-digit birth year in numeric format.</p>';
    }
    if (strlen($_POST['year'])<4){
        $problem = TRUE;
        print '<p class="error">Please enter your four-digit birth year.</p>';
    }
	if (empty($_POST['email'])||(substr_count($_POST['email'],'@')!=1)) {
		$problem = TRUE;
		print '<p class="error">Please enter your email address in the following format: example@sample.com.</p>';
	}

	if (empty($_POST['password1'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a password.</p>';
	}

	if ($_POST['password1'] != $_POST['password2']) {
		$problem = TRUE;
		print '<p class="error">Your password did not match your confirmed password. Please try again.</p>';
	} 
	
	if (!$problem) { // If there weren't any problems...

		// Print a message that includes an auto-generated user ID, how old they will be this year, and the interests they selected.
		print '<p>You are now registered! You will receive a confirmation email shortly.';
        $userID = substr(($_POST['first_name']), 0, 1).substr(($_POST['last_name']), 0, 2).($_POST['year']); 
        print '<p>Your User ID is: '.$userID.'</p><br>'; 
        $date=date('Y');
        $age=$date-($_POST['year']);
        print '<p>You will be '.$age.' this year.</p><br>';
        print '<span class="bold">Your interests:</span><br />';
	       if(isset($_POST['webInterests']) AND is_array($_POST['webInterests'])){
		      foreach($_POST['webInterests'] as $webInterest){print "$webInterest<br />";}
       		}
            if(isset($_POST['programmingInterests']) AND is_array($_POST['programmingInterests'])){
		      foreach($_POST['programmingInterests'] as $programmingInterest){print "$programmingInterest<br />";}
	       	}
            if(isset($_POST['operatingSystems']) AND is_array($_POST['operatingSystems'])){
		      foreach($_POST['operatingSystems'] as $operatingSystem){print "$operatingSystem<br />";}
	       	}

	   $body="Thank you for registering. Your user ID is '$userID'. Your password is '{$_POST['password1']}'. Login <a href=\"login.php\">here</a>";
        mail($_POST['email'],'Registration Confirmation',$body, 'From: admin@sample.com');
	} else {
		print '<p class="error">Please try again!</p>';
		include("form.html");
	}
	
 }	else { // Forgot a field.
	
		
		
include("form.html");

 }
include('templates/footer.html'); ?>
