<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schooldatabase";
$file='';
$filename='';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT file_name FROM study_materials";
$result = mysqli_query($conn, $query);

if(empty($result)) 
{
    echo '<script language="javascript">';
    echo 'alert("Students data not found..!")';
    echo '</script>';
}
else{
$sql = "SELECT file_name,subject,class_no FROM study_materials ORDER BY class_no ASC";
$result = $conn->query($sql);
echo("<br> <form method='post'><div  align='center'><h2>Study materials</h2><table bgcolor='white' border='all'  alignment='center'>");
echo("<tr><td><h3> File Name</h3></td><td><h3>Subject</h3></td><td><h3>Class</h3></td></tr>");
if($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {   
        echo("<tr><td><h5>");
         echo("</h5><a href='uploads/".$row["file_name"]."'>".$row["file_name"]."</td><td><h5>". $row["subject"]."</h5></td><td><h5>". $row["class_no"]."</h5></td></tr>"); 
    }
       
    }
echo("</table></div>");
}
mysqli_close($conn);
?> 
<html>
<head>
<title>school management</title>
<style>
    html { 
  background: url(bg11.jpg) no-repeat center center fixed; 
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
   table {
    border-radius: 12px;
  border-collapse: collapse;
} 
td
{
    padding:0 15px;
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
      <BR>
    <div class="container">
      <div class="row" align="center">
     
         <input  type="button" name="back" id="back" value="HOME" onClick="document.location.href='student_dashboard.php'" />
            
        
      </div>
    </div>
  </body>
</html>