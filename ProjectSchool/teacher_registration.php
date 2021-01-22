<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schooldatabase";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['register_teacher']))
{
// sql to create table
    $query = "SELECT id_no FROM teachers";
    $result = mysqli_query($con, $query);

if(empty($result)) {
$sql = "CREATE TABLE teachers(
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
id_no varchar(10) PRIMARY KEY,
dob varchar(10) NOT NULL,
contact INT(10) NOT NULL,
city varchar(30) NOT NULL,
email VARCHAR(50) NOT NULL,
username varchar(20) NOT NULL,
password varchar(10) NOT NULL,
gender varchar(10),
subject varchar(20)
)";
if(mysqli_query($con, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}}
mysqli_close($con);
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}
$sqlin = "INSERT INTO teachers(VALUES('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["id"]."','".$_POST["dob"]."','".$_POST["con"]."','".$_POST["city"]."','".$_POST["email"]."','".$_POST["user"]."','".$_POST["pw"]."','".$_POST["gender"]."','".$_POST["subject"]."'))";
if(mysqli_query($conn, $sqlin))
{
    echo '<script language="javascript">';
    echo 'alert("Registration Succesful")';
    echo '</script>';
    /* Redirect browser */
//header("Location:admin_dashboard.php"); 
} else{
    echo "ERROR: Could not able to execute $sqlin. " . mysqli_error($conn);
}
mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>
<head>
    <script>
function validateForm() {
  var fn = document.forms["myForm"]["fname"].value;
  if (fn == "") {
    alert("First Name must be filled out");
    return false;
  }
   var ln = document.forms["myForm"]["lname"].value;
  if (ln == "") {
    alert("Last name be filled out");
    return false;
  }
     var id = document.forms["myForm"]["id"].value;
  if (id == "") {
    alert("ID be filled out");
    return false;
  }
     var dob = document.forms["myForm"]["dob"].value;
  if (dob == "") {
    alert("DOB must be filled out");
    return false;
  }
     var con = document.forms["myForm"]["con"].value;
  if (con == "") {
    alert("Enter Contact Number");
    return false;
  }
      var city = document.forms["myForm"]["city"].value;
  if (city == "") {
    alert("Please select your city");
    return false;
  }
     var email = document.forms["myForm"]["email"].value;
  if (email == "") {
    alert("Email should not be empty");
    return false;
  }
   
     var pw = document.forms["myForm"]["pw"].value;
  if (pw == "") {
    alert("Please enter password");
    return false;
  }
     var gen = document.forms["myForm"]["gender"].value;
  if (gen == "select" ) {
    alert("Please select your gender");
    return false;
  }
     var subject = document.forms["myForm"]["subject"].value;
  if (subject == "") {
    alert("Subject must be filled");
    return false;
  }
}

</script>
<meta name="viewport" content="width=50%, initial-scale=0.5">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text],[type=password],[type=email],[type=number],[type=date], select, textarea {
  width:100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 2px;
  box-sizing: border-box;
  margin-top: 0.1px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=submit],[type=button] {
  background-color: #151B8D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 10pxpx;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #151B54;
}
input[type=button]:hover {
  background-color: #151B54;
}
.container {
  border-radius: 2px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body >

<h3>Teacher Detail</h3>

<div class="container" >
  <form name="myForm" method="post" onsubmit="return validateForm()">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

   <label for="id">ID Card Number</label>
    <input type="text" id="id" name="id" placeholder="Your id no..">


   <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob" placeholder="Your dob..">

   <label for="con">Contact Number</label>
    <input type="number" id="con" name="con" maxlength="10" placeholder="Your contact no..">

 
   <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="Your city..">


 <label for="email"> Email id</label>
    <input type="email" id="email" name="email" placeholder="Your emailid..">

<label for="user">UserName</label>
    <input type="text" id="user" name="user" placeholder="Your username..">

<label for="pw">Password</label>
    <input type="password" maxlength="10" id="pw" name="pw" placeholder="Your password..">

  <label for="gender">Gender</label>
    <select id="gender" name="gender">
        <option >select</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="others">Others</option>
    </select>

    <label for="subject">Subject Speclization</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:50px"></textarea>

    <input class="btn" type="submit" name="register_teacher" id="register_teacher" value="Register">
       <input  type="button" name="back" id="back" value="HOME" onClick="document.location.href='admin_dashboard.php'" />
  </form>
</div>
</body>
</html>
