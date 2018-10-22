<?php



// define variables and set to empty values
$fnameErr = $lnameErr = $dateErr = $emailErr = $genderErr = $bloodgroupErr = $passwordErr = "";
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
    
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $lameErr = "Only letters and white space allowed";
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
    $bloodgroup = test_input($_POST["bloodgroup"]);
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



echo ("Password: ".$Password);
echo "<br>";

echo ("Gender: ".$gender);
echo "<br>";
echo ("Blood Group: ".$bloodgroup);
echo "<br>";
echo ("dob: ".$date);
echo "<br>";

?>