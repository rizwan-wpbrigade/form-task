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
  $name=$lastName=$gender=$email=$phone=$address=$password=$confirmPassword=$submit="";
  $nameErr=$lnameErr=$genderErr=$emailErr=$phoneErr=$addressErr=$passwordErr=$confirmpassErr=$markcheckErr=$submitErr="";

    // validation and sanitization of form field

    if ($_SERVER["REQUEST_METHOD"]== "POST") {
          // check isempty field and sanitize 
      $name=filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
      if (empty($name)) {
          $nameErr="First Name is required";
      }  elseif (strlen($name)<2 || strlen($name)>20) {
          $nameErr="Enter name between 2 to 20 character";
      }    
              // Validate the Name field
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
         $nameErr=" Only can contain letter and whitespaces";
      }

         // check is empty field and validation and Sanitization of name field
         $lastName=filter_var($_POST['lname'], FILTER_SANITIZE_STRING);  
      if (empty($lastName)) {
        $lnameErr="last Name is required";
      } 
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
         $lnameErr=" Only can contain letter and whitespaces ";
      }
      if (strlen($name)<2 || strlen($name)>20 ) {
        $nameErr="Enter name between 2 to 20 character";
      }

      // validation and Sanitization
          $email=filter_var($email, FILTER_SANITIZE_EMAIL);
      if (empty($_POST['gender'])) {
          $genderErr="Choose gender";
      }
      // validation and Sanitization of Email field
      if (empty($_POST['email'])) {
        $emailErr="Please enter valid email address with @ and .com";
      } 
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr="email id is correct";
      } 

      // validation and Sanitization of Phone field
      $phone=filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
      if (empty($phone)) {
      $phoneErr="Phone Number is required";
      }
      elseif (Strlen($phone)>7) {
      $phoneErr="Its too long";
      }
      else{
      filter_var($phone, FILTER_VALIDATE_INT);
      }

        // validation and Sanitization of password field;
      if(empty($_POST['password'])) {
        $passwordErr="Please enter your Passord with max-length 20 and min-length 6";
      }
      elseif(strlen($_POST['password'])<6) {

      $passwordErr="Your password is too short";
      }
      elseif(strlen($_POST['password'])>20) {
        $passwordErr="your password is too long";
      }
      else{
        $passwordErr="Password is correct";
      }
      if($_POST['password'] == $_POST['cpwd']) {
        $confirmpassErr="Confirmed";
      }
      else{
        $confirmpassErr=" not confirmed"; 
      }

      if(empty($_POST['checkbox'])) {
        $markcheckErr="Please Mark the check box";
      }
        // validation and sanitize
          $address=filter_var($_POST['address'], FILTER_SANITIZE_STRING);
      if (empty($address)) {
          $addressErr="Enter your correct address";
      } else {
          $address=test_input($_POST['address']);
      } if (strlen($address)<10 && strlen($address)>50) {
          $addressErr="Enter address between 10 to 50 character";
      }
  }
        // to check that form is submit or not
         if (!isset($_POST['submit'])) {
            $submitErr = "Form is not submit";
      } else {
            $submitErr = "Form is Submited";
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
    First name: <input type="text" placeholder="First Name" name="fname">
    <span class="error">* <?php echo $nameErr;?></span>  
    <br><br>
    Last name: <input type="text" placeholder="Last Name" name="lname">
    <span class="error">*<?php echo "$lnameErr"?></span>
    <br><br>
    Gender:
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="female">Female
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    Email:  <input type="email" placeholder="Email" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Phone: <input type="tel" name="phone" placeholder="Number">
    <span class="error">* <?php echo "$phoneErr";?></span>
    <br><br>
    Address:<input type="text" placeholder="Address" name="address">
    <span class="error">* <?php echo "$addressErr";?></span>
    <br><br>
    Password:<input type="password" placeholder="Password" name="password">
    <span class="error">* <?php echo "$passwordErr";?></span>
    <br><br>
    Confirm Password:<input type="password" placeholder="Confirm Password" name="cpwd">
    <span class="error">* <?php echo "$confirmpassErr";?></span>
    <br><br>
    <input type="checkbox" name="checkbox"/> I agree to the Terms and Conditions.
    <span class="error">* <?php echo "$markcheckErr";?></span>
    <br><br>  
    <input type="submit" name="submit">
    <br><br>
    <span><?php echo "$submitErr";?></span>
  </form>
  
  
</body>
</html>