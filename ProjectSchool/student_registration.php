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
if(isset($_POST['register_student']))
{
// sql to create table
    $query = "SELECT id_no FROM students";
    $result = mysqli_query($con, $query);

if(empty($result)) {
$sql = "CREATE TABLE students(
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
id_no varchar(10) PRIMARY KEY,
section varchar(20) NOT NULL,
dob varchar(10) NOT NULL,
contact BIGINT(10) NOT NULL,
address varchar(100)NOT NULL,
mother_name varchar(20) NOT NULL,
mother_cont BIGINT(10) NOT NULL,
father_name varchar(20)NOT NULL,
father_cont BIGINT(10) NOT NULL,
email VARCHAR(50) NOT NULL,
city varchar(30) NOT NULL,
username varchar(20) NOT NULL,
password varchar(10) NOT NULL,
gender varchar(10)
)";
if(mysqli_query($con, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
}
mysqli_close($con);
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}
$section=$_POST['section1']."".$_POST['section2'];
$sqlin = "INSERT INTO students(VALUES('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["id"]."','".$section."','".$_POST["dob"]."','".$_POST["con"]."','".$_POST["ad"]."','".$_POST["momname"]."','".$_POST["momcon"]."','".$_POST["fatname"]."','".$_POST["fatcon"]."','".$_POST["city"]."','".$_POST["email"]."','".$_POST["user"]."','".$_POST["pw"]."','".$_POST["gender"]."'))";
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
         var sec1 = document.forms["myForm"]["section1"].value;
  if (sec1 == "Select Class") {
    alert(" Select class");
    return false;
  }
    var sec2 = document.forms["myForm"]["section2"].value;
  if (sec2 == "Select Section") {
    alert(" Select Section");
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
        var add = document.forms["myForm"]["ad"].value;
  if (add == "") {
    alert("Enter Address");
    return false;
  }
        var momname = document.forms["myForm"]["mom"].value;
  if (momname == "") {
    alert("Enter Mother name");
    return false;
  }
        var mc = document.forms["myForm"]["mc"].value;
  if (mc == "") {
    alert("Enter Mother's contact details");
    return false;
  }
        var fat = document.forms["myForm"]["fat"].value;
  if (fat == "") {
    alert("Enter Father name");
    return false;
  }
     var fc = document.forms["myForm"]["fc"].value;
  if (fc == "") {
    alert("Enter Father's contact");
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
        var user = document.forms["myForm"]["user"].value;
  if (user == "") {
    alert("Username should not be empty");
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
   
}
    </script>
    
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text],[type=email],[type=password],[type=number],[type=date], textarea {
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
  border-radius: 1px;
  cursor: pointer;
}
select{
  width:10%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 2px;
  box-sizing: border-box;
  margin-top: 0.1px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit],[type=button]:hover {
  background-color: #151B54;
}

.container {
  border-radius: 2px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Student Info</h3>

<div class="container">
  <form method="post" name="myForm" onsubmit="return validateForm()">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

   <label for="id">IdentityCard Number</label>
    <input type="number" id="id" name="id" placeholder="Your id no..">
    <label for="section">Class</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="section">Section</label>
    <br><select id="section1" name="section1">
        <option >Select Class</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
      <select id="section2" name="section2">
        <option >Select Section</option>
        <option value="A">A</option>
        <option value="B">B</option>
          <option value="C">C</option>
    </select><br>

   <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob" placeholder="Your dob..">

   <label for="con">Contact Number</label>
    <input type="number" id="con" name="con" placeholder="Your contact no..">

<label for="ad">Address</label>
    <input type="text" id="ad" name="ad" placeholder="Your address..">


<label for="mom">Mother Name</label>
    <input type="text" id="mom" name="momname" placeholder="Your mothername..">

<label for="mc">Mother ContactDetails</label>
    <input type="number" id="mc" name="momcon" placeholder="Your mothercontact..">

<label for="fat">Father Name</label>
    <input type="text" id="fat" name="fatname" placeholder="Your fathername..">

<label for="fc">Father ContactDetails</label>
    <input type="number" id="fc" name="fatcon" placeholder="Your fathercontact..">

 
   <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="Your city..">


 <label for="email"> Email id</label>
    <input type="email" id="email" name="email" placeholder="Your emailid..">

<label for="user">UserName</label>
    <input type="text" id="user" name="user" placeholder="your student id...">

<label for="pw">Password</label>
    <input type="password" id="pw" name="pw" placeholder="Your password..">

  <label for="gender">Gender</label><br>
    <select id="gender" name="gender">
        <option value="select">select from here</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="others">Others</option>
    </select><br>

 <input class="btn" type="submit" name="register_student" id="register_student" value="Register">
     <input  type="button" name="back" id="back" value="HOME" onClick="document.location.href='admin_dashboard.php'" />
  </form>
</div>

</body>
</html>