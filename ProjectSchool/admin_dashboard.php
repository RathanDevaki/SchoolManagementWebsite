<html>
<head>
<title>Admin</title>
<style>
    html { 
  background: url(icons/admin2.jpg) no-repeat center center fixed; 
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
    height:50px;
background: #aaeeff;
    color: Black;
}
#sidebar{
width: 300px;
height: 600px;
background: #aaeeff;
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
<body>

<div id="header" align='center'>
<font size='10' >Administrator</font>
<hr width=100% color="black">
</div>

<div id="sidebar">
<font size='6'><ul>
    <li><a STYLE="text-decoration:none"  href="admin_view_teacher.php">View Teacher</a></li>
    <li><a STYLE="text-decoration:none"  href="admin_view_students.php">View Students</a></li>
    <li><a STYLE="text-decoration:none"  href="teacher_registration.php">Add Teacher</a></li>
    <li><a STYLE="text-decoration:none"href="student_registration.php">Add Student</a></li>
    <li><a STYLE="text-decoration:none"href="view_complaints.php">View Complaints</a></li>

    <li><a STYLE="text-decoration:none"href="notice.php"> Notice/Guidlines</a></li>
<li><a STYLE="text-decoration:none" href="logout.php">Logout</a></li>
</font>
</div>
   

</body>
</html>