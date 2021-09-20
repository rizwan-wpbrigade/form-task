<html>
  <title>Registration Form</title>
  <style>
    .error{
      color:red;
    }
  </style>
  <body>
  <?php


  // variable declare
  $name     = "";
  $lastName = "";
  $email    = "";
  $phone    = "";
  $address  = "";
  $password = "";
  $confirmPassword = ""; 
  $submit   = "";

  $nameErr      = '';
  $lnameErr     = '';
  $genderErr    = '';
  $emailErr     = '';
  $phoneErr     = '';
  $addressErr   = '';
  $passwordErr  = '';
  $confirmpassErr='';  
  $markcheckErr = '';
  $submitErr    = '';

   
    	// validation and sanitization of form field
      
		if ($_POST && isset($_POST['submit'])) {
		  
		// validation and sanitization of name
			$name=$_POST['fname'];
		if ( empty($name) || !str_replace(' ', '', $name)) {
			$nameErr = "name is required";
			$name=filter_var($name, FILTER_SANITIZE_STRING);

		}	elseif ( !preg_match("/^[a-zA-Z-' ]*$/",$name) ) {
			$nameErr="Only can contain letter";

		}	elseif ( strlen($name)<2 || strlen($name)>20 ) {
			$nameErr="Enter name between 2 to 20 character";	
		} 
		
		// check is empty field of name field and validation Sanitization of name field
			$lastName=$_POST['lname'];
		if ( empty($lastName) || !str_replace(' ', '', $lastName) ) {
			$lnameErr="name is required";
			$lastName=filter_var($lastName, FILTER_SANITIZE_STRING);

		}	elseif ( !preg_match("/^[a-zA-Z-' ]*$/",$lastName) ) {
			$lnameErr=" Only can contain letter";

		}	elseif ( strlen($lastName)<2 || strlen($lastName)>20 ) {
			$lnameErr="Enter name between 2 to 20 character";
		}

		// validation and Sanitization of gender field
		if ( !empty($_POST['gnder']) ) {
			$gender=$_POST['gnder'];
		}	else {
			$genderErr="gender is required";
		}
		
		// validation and Sanitization of Email field
		if ( empty($_POST['email']) ) {
			$emailErr="email is required";
		} 
		else {
			$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
				$emailErr="enter valid email address ";
			}
		}
		if ( Strlen( $_POST['email'] ) < 2  &&  Strlen( $_POST['email'] ) > 20 ) {
			$emailErr="invalid email id";
		}
            
		// validation and Sanitization of Phone field
		if ( empty($_POST['phone']) ) {
			$phoneErr="phone is required";
		}	
		else {
			$phone=filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
			if ( !filter_var($phone, FILTER_VALIDATE_INT) ) {
				$phoneErr="invalid phone number";
			}
		}
		if ( Strlen($_POST['phone'] ) !=7 ) {
          	$phoneErr="not valid phone number";
		} 

        // validation and Sanitization of password field;
		$password=$_POST['password'];
		if (empty(trim($password))) {
			$passwordErr="password is required within 6 to 20 character";
		}	elseif (strlen($_POST['password'])<6) {
        	$passwordErr="password is required within 6 to 20 character";
        }	elseif (strlen($_POST['password'])>20) {
			$passwordErr="password is required within 6 to 20 character";
		}

        // Validate confirm password
		$confirmPassword=$_POST['cpwd'];
		if (empty(trim($confirmPassword))) {
			$confirmpassErr = "confirm password is required";
		} else {
			$confirmPassword = trim($_POST['cpwd']);
			if ( empty($password_err) && ($password != $confirmPassword) ) {
				$confirmpassErr = "Password did not match";
			}
		}

		// check the checkbox section
		if (empty($_POST['checkbox'])) {
			$markcheckErr="Please Mark the check box";
		}

		// validation and sanitize address 
		if ( empty( $_POST['address'] ) || !str_replace( ' ', '', $_POST['address'] )) {
			$addressErr="address is required";
		} elseif (strlen($_POST['address'])<5 ||  (strlen($_POST['address'])>50)) {
			$addressErr="enter valid address";
		} else {
			$address=filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		}

		// to print form submission status

			if( empty($nameErr)&&
				empty($lnameErr)&&
				empty($genderErr)&&
				empty($emailErr)&&
				empty($phoneErr)&&
				empty($addressErr)&&
				empty($passwordErr)&&
				empty($confirmpassErr)&&
				empty($markcheckErr)&&
				empty($submitErr) ) {
				
				echo "<h2> $name your form is submitted</h2>";
			}
	}
        
?>

 
	<h3>Registration Form</h2>
	<span class="error"><p>* required field:</p></span>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		First name: <input type="text" placeholder="First Name" name="fname" value="<?php echo $name?>">
		<span class="error">* <?php echo $nameErr;?></span>  
		<br><br>
		Last name: <input type="text" placeholder="Last Name" name="lname" value="<?php echo $lastName?>">
		<span class="error">*<?php echo "$lnameErr"?></span>
		<br><br>
		Gender:
		<input type="radio" name="gnder" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
		<input type="radio" name="gnder" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
		<span class="error">* <?php echo $genderErr;?></span>
		<br><br>
		Email:  <input type="text" placeholder="Email" name="email" value="<?php echo $email?>">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>
		Phone: <input type="tel" name="phone" placeholder="Number" value="<?php echo $phone?>" >
		<span class="error">* <?php echo "$phoneErr";?></span>
		<br><br>
		Address:<input type="text" placeholder="Address" name="address" value="<?php echo $address?>">
		<span class="error">* <?php echo "$addressErr";?></span>
		<br><br>
		Password:<input type="password" placeholder="Password" name="password" value="<?php echo $password?>">
		<span class="error">* <?php echo "$passwordErr";?></span>
		<br><br>
		Confirm Password:<input type="password" placeholder="Confirm Password" name="cpwd" value="<?php echo $confirmPassword?>">
		<span class="error">* <?php echo "$confirmpassErr";?></span>
		<br><br>
		<input type="checkbox" name="checkbox"/> I agree to the Terms and Conditions.
		<span class="error">* <?php echo "$markcheckErr";?></span>
		<br><br>
		<input type="submit" name="submit" value="submit">
		<br><br>
	</form>
</body>
</html>