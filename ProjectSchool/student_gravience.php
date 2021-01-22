<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schooldatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['post_comp']))
{
// sql to create table
    $query = "SELECT id FROM grievance";
    $result = mysqli_query($conn, $query);

if(empty($result)) {
$sql = "CREATE TABLE grievance(
complaints VARCHAR(200) NOT NULL,
id varchar(20)
)";
if(mysqli_query($conn, $sql))
{
    echo "Table created successfully.";
} 
}
 else{
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
$sqlin = "INSERT INTO grievance(VALUES('".$_POST["comp"]."','".$_POST["user"]."'))";
if(mysqli_query($conn, $sqlin))
{
    echo '<script language="javascript">';
    echo 'alert("Complaint Posted Succesful")';
    echo '</script>';
    /* Redirect browser */
//header("Location:admin_dashboard.php"); 
} else{
    echo "ERROR: Could not able to execute $sqlin. " . mysqli_error($conn);
}
mysqli_close($conn);
}
}
?>
<html>
<head>
    <script>
function validateForm() {
  var fn = document.forms["myForm"]["user"].value;
  if (fn == "") {
    alert("UserName must be filled out");
    return false;
  }
     var txt = document.forms["myForm"]["styled"].value;
  if (txt == "") {
    alert("Enter complaints");
    return false;
  }
    </script>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
textarea#styled {
	width: 600px;
	height: 120px;
	border: 3px solid #cccccc;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
}
input[type=text] {
  width:600px;
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
    html { 
  background: url(contact_us.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body{
    margin: 0px;
    border: 0px;
}
#header{
    width: 100%;
    height: 60px;
background: #2B65EC;
    color: white;
}
#sidebar{
width: 300px;
height: 500px;
background:peachpuff;
float: left;
}
 ul li{
padding: 20px;
border-bottom: 2px solid grey;
}
ul li:hover {
background: black;
color: white;
}

</style>
</head>
<body>
<br><br><br>
<div  align="center">
    <h3>Post Your complaints here..!</h3>

  <form method="post" name="myForm" onsubmit="return validateForm()">
   <div> <textarea name="comp" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Enter your comment here...</textarea>
       <div class="inline-block">
							<div class="form-label">
							<input type="text" name="user" id="user" class="input-box-330" placeholder="Your Email ID" >
				
      </div><br>
 <div><input  type="submit" name="post_comp" id="post_comp" value="Post">
     <input  type="button" name="back" id="back" value="HOME" onClick="document.location.href='student_dashboard.php'" /></div>
  </form>
</div>
    <script>
        function setbg(color)
        {
            document.getElementById("styled").style.background=color
        }
    </script>
</body>
</html>