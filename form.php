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
  $name     = '';
  $lastName = '';
  $email    = '';
  $phone    = '';
  $address  = '';
  $password = '';
  $gender   = '';           
  $confirmPassword = '';
  $submit   = '';

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
      
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
          $name = $_POST['fname'];
      if (empty($name)) {  
         $nameErr = "name is required";
      } else {
        $name=filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
        }

        

        $name = strlen ($_POST['fname']);
      if ($name<2 || $name>20) {

          $nameErr="name is required between 2 to 20 character";
          
      } else {  
        // Validate the Name field
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr=" Only can contain letter and whitespaces";
          }
        }

         // check is empty field and validation and Sanitization of name field
           
      if (empty($lastName)) {
        $lnameErr="name is required";
      } 

        $lastName=filter_var($_POST['lname'], FILTER_SANITIZE_STRING);

      if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
         $lnameErr=" Only can contain letter and whitespaces ";
      }
      if (strlen($name)<2 || strlen($name)>20 ) {
        $nameErr="Enter name between 2 to 20 character";
      }

      // validation and Sanitization
        if (!empty($_POST['gnder'])) {

        $gender=$_POST['gnder'];
        }
        else {
          $genderErr="gender is required";
        }
          
        // validation and Sanitization of Email field
          $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
          $emailErr="email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr="enter valid email address with @ and .com";
        } 
        
        // validation and Sanitization of Phone field
        $phone=filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        if (empty($phone)) {
          $phoneErr="phone is required";
        }
        elseif (Strlen($phone)>7) {
          $phoneErr="Its too long";
        }
        else {
        filter_var($phone, FILTER_VALIDATE_INT);
        }

        // validation and Sanitization of password field;
        $password=$_POST['password'];
        if(empty(trim($password))) {
          $passwordErr="password is required within 6 to 20 character";
        }
        elseif(strlen($_POST['password'])<6) {
        $passwordErr="Your password is too short";
        }
        elseif(strlen($_POST['password'])>20) {
        $passwordErr="your password is too long";
        }

        // Validate confirm password
        $confirmPassword=$_POST['cpwd'];
        if(empty(trim($confirmPassword))){
        $confirmpassErr = "confirm password is required";     
        } else {
        $confirmPassword = trim($_POST['cpwd']);
        if(empty($password_err) && ($password != $confirmPassword)){
          $confirmpassErr = "Password did not match";
        }
        }

      // check the checkbox section
        if(empty($_POST['checkbox'])) {
        $markcheckErr="Please Mark the check box";
        }
        // validation and sanitize address
          $address=filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        if (empty($address)) {
            $addressErr="address is required";
        } else {
            $address=trim($_POST['address']);
        } if (strlen($address)<10 && strlen($address)>50) {
            $addressErr="Enter address between 10 to 50 character";
        }
    } 
      
        // validation and sanitize function
        function test_input($data){
          $data=trim($data);
          $data=stripslashes($data);
          $data=htmlspecialchars($data);
          return $data;
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
        <input type="reset" name="reset">
          <br><br>

        </form>
      </body>
      </html>