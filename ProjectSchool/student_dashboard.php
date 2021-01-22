<html>
<head>
<title>Student</title>
<style>
     html { 
  background: url(bg8.jpg) no-repeat center center fixed; 
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
    height: 50px;
background: #0088FF;
    color: white;
}
#sidebar{
width: 300px;
height: 100%;
background:#0099FF;
float: left;
}
 ul li{
padding: 20px;
border-bottom: 2px solid ;
}
ul li:hover {
background: black;
color: white;
}


</style>
</head>
<body>
<body>

<div id="header" align="center">
<font size='10' text-align="center">Student Dashboard</font>

</div>

<div id="sidebar">
<font size='6'><ul>
    <li><a STYLE="text-decoration:none" href="student_dashboard.php"> Home</a> </li>
    <li><a STYLE="text-decoration:none" href="study_material_stud.php">Study Material</a></li>
    <li><a STYLE="text-decoration:none"href="notice.php">Notice/Guidlines</a></li>
<li><a STYLE="text-decoration:none"href="extracc.php">Extra Curricular Activities</a></li>
    <li><a STYLE="text-decoration:none" href="student_gravience.php">Grievance</a></li>
    <li><a STYLE="text-decoration:none"href="logout.php">Logout</a></li>
</font>
</div>

<div id="data">

</div>

</body>
</html>