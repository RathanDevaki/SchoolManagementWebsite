<?php
// connect to the database
$con = mysqli_connect('localhost', 'root', '', 'schooldatabase');
   
if(isset($_POST['save']))
{
// sql to create table
    $query = "SELECT file_name FROM study_materials";
    $result = mysqli_query($con, $query);

if(empty($result)) {
$sql = "CREATE TABLE study_materials(
file_name VARCHAR(300) NOT NULL,subject VARCHAR(200) NOT NULL,class_no INT(5) NOT NULL
)";
if(mysqli_query($con, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}}
    
$class_no=$_POST['class_no'];
$sub=$_POST['subject'];
    
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["myfile"]["name"]);
$extension = end($temp);
$upload_pdf=$_FILES["myfile"]["name"];
move_uploaded_file($_FILES["myfile"]["tmp_name"],"uploads/" . $_FILES["myfile"]["name"]);
$sql="INSERT INTO study_materials(VALUES('".$upload_pdf."','".$sub."','".$class_no."'))" ;
if(mysqli_query($con, $sql))
{  
    echo '<script language="javascript">';
    echo 'alert("Uploaded Succesful")';
    echo '</script>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);
}
?>


<html>
<head>
    <script>
function validateForm() {
     var fil = document.forms["myForm"]["myfil"].value;
  if (fil == "") {
    alert("Please Select PDF file");
    return false;
  }
  var sub = document.forms["myForm"]["subject"].value;
  if (sub == "") {
    alert("Subject details must be filled out");
    return false;
  }
   var cn = document.forms["myForm"]["class_no"].value;
  if (cn == "Select Class") {
    alert("Please select the class");
    return false;
  }
}
    </script>
<style>
    <link rel="stylesheet" href="style.css">
    html { 
  background: url(bg7.jpg) no-repeat center center fixed; 
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
    input[type=text],[type=password],[type=email],[type=number],[type=date], select, textarea {
  width:30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 2px;
  box-sizing: border-box;
  margin-top: 0.1px;
  margin-bottom: 16px;
  resize: vertical;
}
inpu[type=button],[type=submit] {
  background-color: #151B8D;
  color: white;
  padding: 12px 20px;
  border: none;
    
  border-radius: 10pxpx;
  cursor: pointer;
}

input[type=submit],[type=button]:hover {
  background-color: #151B54;
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
  <body><br><BR><BR>
    <div class="container">
      <div class="row" align="center">
        <form method="post"  enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile" id="myfil" accept="application/pdf"> <br><br>
            <input type="text" id="subject" name="subject" placeholder="Enter Subject details"><br>
    <select id="class_no" name="class_no">
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
    </select><br>
          <button type="submit" name="save">Upload</button> &nbsp; &nbsp;
             <input  type="button" name="back" id="back" value="HOME" onClick="document.location.href='teacher_dashboard.php'" />
        </form>
      </div>
    </div>
  </body>
</html>