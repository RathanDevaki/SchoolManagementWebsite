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
$query = "SELECT id_no FROM teachers";
$result = mysqli_query($conn, $query);

if(empty($result)) 
{
    echo '<script language="javascript">';
    echo 'alert("Students data not found..!")';
    echo '</script>';
}
$sql = "SELECT firstname,lastname,id_no,contact FROM teachers";
$result = $conn->query($sql);
echo("<br><br><br><div  align='center'><table border='all' alignment='center'>");
echo("<tr><td><h3> First name</h3></td><td><h3>Last Name</h3></td><td><h3>Teacher ID</h3></td><td><h3>Contact</h3></td></tr>");
if($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {   
        echo("<tr><td><h5>");
         echo($row["firstname"]."</h5></td><td><h5>". $row["lastname"]."</h5></td><td><h5>". $row["id_no"]."</h5></td><td><h5>". $row["contact"]."</h5></td></tr>"); 
    }
       
    }
echo("</table> <br><br></div>");
mysqli_close($conn);


?>
<html>
<head>
<title>school management</title>
<style>
    html { 
  background: url(bg4.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
    input[type=button] {
  background-color: #151B8D;
  color: white;
  padding: 12px 20px;
        width:15    %;
  border: none;
  border-radius: 1px;
  cursor: pointer;
}
input[type=button]:hover {
  background-color: #151B54;
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
    <div align="center"><input  type='button' name='back' id='back' value='HOME' onClick='document.location.href="admin_dashboard.php" ' /></div>
</body>
</html>