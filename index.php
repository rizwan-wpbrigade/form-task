<!DOCTYPE HTML> 
<html>
<head>
	<title>Registration Form </title>
		
	<!-- add internal styling of form -->
	<style>
	
	body { background:#778899; }

	.error { color:red; }

	.content {	
		max-width: 550px;
		height: auto;
 		margin: auto;
  		background: white;
  		padding: 10px;
		}

		h2 { color:white;}

	</style>

</head>
<body>

<?php

// define variable 
$first_name = NULL;
$last_name = NULL;
$gender	  = NULL;
$email    = NULL;
$phone    = NULL;
$address  = NULL;
$password = NULL;
$confirmPassword = NULL;
$checkbox = NULL;
$submit   = NULL;


// declare variable false for check error
$nameErr	= NULL;
$lnameErr	= NULL;
$genderErr	= NULL;
$emailErr	= NULL;
$phoneErr	= NULL;
$addressErr	= NULL;
$passwordErr= NULL;
$confirmpassErr = NULL;
$markcheckErr = NULL;
$submitErr	= NULL;
$find_error = false;


// Apply  validation and sanitization on Registration Form

if ( $_POST && isset($_POST['submit']) ) {


	// check validation and sanitize first_name field
	$first_name = trim($_POST['fname']);

	if ( empty($first_name) ) {
		 
		$nameErr = "required";
		$find_error = true;
		$first_name = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
	
	} elseif ( !preg_match("/^[a-zA-Z-' ]*$/",$first_name) ) {

		$nameErr = "Only can contain letter";
		$find_error = true;

	// check the max and min length

	} elseif ( 2>=strlen($first_name) || 20<=strlen($first_name) ) {

		$nameErr = "Enter name between 2 to 20 character" ;
		$find_error = "true";
	}


	// check validation and sanitize last_name field
	$last_name = trim( $_POST['lname'] );

	if ( empty($last_name) ) {
		 
		$lnameErr = "required";
		$find_error = true;
		$last_name = filter_var($last_name, FILTER_SANITIZE_STRING) ;

	} elseif ( !preg_match("/^[a-zA-Z-' ]*$/", $last_name ) ) {

		$lnameErr = "Only can contain letter";
		$find_error = true;
		
	// check the max and min length

	} elseif ( 2>=strlen($last_name) || 20<=strlen($last_name) ) {

		$lnameErr = "Enter name between 2 to 20 character";
		$find_error = true;
	}


	// check validation and sanitize gender field
	
	if (!empty($_POST['gender']) ) {

		$gender = $_POST['gender'];	

	} else {
	
		$genderErr = "required";
		$find_error = true;
	}


	// check validation and sanitize email

	$email = $_POST['email'];

	if ( empty($email) ) {

		$emailErr = "required";
		$find_error = true;
		
	} else {

		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			
			$emailErr = "enter valid email address";
			$find_error = true;
		}
	}

	// check the max and min length
	if ( 1>=strlen($email) && 20<=strlen($email) ) {
		
		$emailErr = "invalid email id";
		$find_error = true;
	}



	// check validation and sanitize phone field
	
	$phone = $_POST['phone'];

	if ( empty($phone) ) {
		
		$phoneErr = "required";
		$find_error = true;
		$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);

	} elseif ( !filter_var($phone, FILTER_VALIDATE_INT) )  {
		
		$phoneErr = "invalid phone number";
		$find_error = true;

	} else {
		
		if ( Strlen($phone) !=7 ) {
			
			$phoneErr = "invalid phone number";
			$find_error = true;
		}
	}


	// check validation and sanitize password field

	$password = trim($_POST['password']);

	if ( empty($password) ) {
		
		$passwordErr = "password is required within 6 to 20 character";
		$find_error = true;

	} elseif ( strlen($password)<6 || strlen($password)>20 ) {
		
		$passwordErr = "password is required within 6 to 20 character";
		$find_error = true;
	}


	// check validation and sanitize confirm_password field

	$confirmPassword = trim($_POST['cpwd']);

	if ( empty($confirmPassword) ) {
		
		$confirmpassErr = "confirm password is required";
		$find_error = true;

	} elseif ( empty($find_error) && ($password != $confirmPassword) ) {
		
		$confirmpassErr = "Password did not match";
		$find_error = true;
	}

	// check validation and sanitize address field

	$address = $_POST['address'];

	if ( empty($address) ) {
		
		$addressErr = "address is required";
		$find_error = true;

	} elseif ( strlen($address)<5 ||  (strlen($address)>50) ) {
		
		$addressErr = "enter valid address";
		$find_error = true;

	} else {
		
		$address=filter_var($address, FILTER_SANITIZE_STRING);
	}



	// check validation and sanitize check field

	if ( empty($_POST['checkbox']) ) {
		
		$markcheckErr = "Please mark the check box";
		$find_error = true;
	}

	
	// to print the form submission status

	if ( $find_error == false) {
		
		echo "<h2> $first_name your form is submitted</h2>";
	}
}

?>


<div class="content">
<h3>Registration Form</h3>
<span class="error"><p>* required field:</p></span> 

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	
	
	First name: <input type="text" placeholder="First Name" name="fname" value="<?php echo trim($first_name); ?>">
		<span class="error">* <?php echo "$nameErr";?></span>  
		<br><br><br>

	Last name: <input type="text" placeholder="Last Name" name="lname" value="<?php echo trim($last_name);?>">
		<span class="error">*<?php echo "$lnameErr"?></span>
		<br><br><br>
        
	Gender:
	    <input type="radio" name="gender" <?php if (isset($gender) && $gender==="male") echo "checked";?> value="male">Male
	    <input type="radio" name="gender" <?php if (isset($gender) && $gender==="female") echo "checked";?> value="female">Female
	    <span class="error">* <?php echo "$genderErr";?></span>
		<br><br><br>

	Email:  <input type="text" placeholder="Email" name="email" value="<?php echo $email?>">
		<span class="error">* <?php echo "$emailErr";?></span>
		<br><br><br>

	Phone: <input type="tel" name="phone" placeholder="Number" value="<?php echo $phone?>" >
		<span class="error">* <?php echo "$phoneErr";?></span>
		<br><br><br>

	Address:<input type="text" placeholder="Address" name="address" value="<?php echo $address?>">
		<span class="error">* <?php echo "$addressErr";?></span>
		<br><br><br>

	Password:<input type="password" placeholder="Password" name="password" value="<?php echo $password?>">
		<span class="error">* <?php echo "$passwordErr";?></span>
		<br><br><br>

	Confirm Password:<input type="password" placeholder="Confirm Password" name="cpwd" value="<?php echo $confirmPassword?>">
		<span class="error">* <?php echo "$confirmpassErr";?></span>
		<br><br><br>

	<input type="checkbox" name="checkbox" <?php if (isset($_POST['checkbox'])) echo "checked"; ?>/> I agree to the Terms and Conditions.
		<span class="error">* <?php echo "$markcheckErr";?></span>
		<br><br><br>

	<input type="submit" name="submit" value="submit">
		<br><br><br>

	</form>

</div>
</body>
</html>