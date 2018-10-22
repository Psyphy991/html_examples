<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$fnameErr =$dateErr = $lnameErr= $emailErr = $genderErr = $bloodgroupErr = $passwordErr = "";
$fname = $lname = $date =  $email = $gender = $bloodgroup = $Password = "";

if ($_SERVER["REQUEST_METHOD"] = "POST" ) {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
    else{ echo $fname; echo "<br>";}
  }
  if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed"; 
    }
    else{ echo $lname; echo "<br>";}
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
    else{ echo $email; echo "<br>";}
  }
  if (empty($_POST["Password"])) {
    $passwordErr = "Blood Group is required";
  } else {
    $Password = test_input($_POST["Password"]);
  }
    

  if (empty($_POST["bloodgroup"])) {
    $genderErr = "Blood Group is required";
  } else {
    $gender = test_input($_POST["bloodgroup"]);
  }

  if (isset($_POST["date"])){
   $date = test_input($_POST["date"]);
  } else {
    echo $date;
    }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>USER INFORMATION</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="form.php">  
  <fieldset style="width: 30%">
    <LEGEND>Info Form</LEGEND>
  First Name: <input type="text" name="fname" value="<?php echo $fname;?>">
  <span class="error">* <?php echo $fnameErr;?></span>
  <br><br>

  Last Name: <input type="text" name="lname" value="<?php echo $lname;?>">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="Password" name="Password" value="<?php echo $Password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  

  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Blood Group: <select name="bloodgroup">
              <option value="A+" <?php if($bloodgroup == 'A+'){echo "selected";}?> >A+</option>
              <option value="A-" <?php if($bloodgroup == 'A-'){echo "selected";}?> >A-</option>
              <option value="B+" <?php if($bloodgroup == 'B+'){echo "selected";}?> >B+</option>
              <option value="B-" <?php if($bloodgroup == 'B-'){echo "selected";}?> >B-</option>
              <option value="AB+" <?php if($bloodgroup == 'AB+'){echo "selected";}?>>AB+</option>
              <option value="AB-" <?php if($bloodgroup == 'AB-'){echo "selected";}?>>AB-</option>
              <option value="O+" <?php if($bloodgroup == 'O+'){echo "selected";}?>>O+</option>
              <option value="O-" <?php if($bloodgroup == 'O-'){echo "selected";}?>>O-</option>
          </select><br><br>

          Date : <br>
                  <input type="date" name="date" value="<?php echo $date;?>">
                  <br><br>
  <hr>
  <input type="submit" name="submit" value="Registar">  
</fieldset>
</form>



</body>
</html>