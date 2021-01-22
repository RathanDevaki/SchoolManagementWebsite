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
if(isset($_POST['login-btn']))
{ 
    $query = "SELECT username FROM admin_table";
    $result = mysqli_query($con, $query);

if(empty($result)) {
$sql = "CREATE TABLE admin_table(
username VARCHAR(20) NOT NULL,
password VARCHAR(10) NOT NULL
)";
if(mysqli_query($con, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}


$sqlin = "INSERT INTO admin_table(VALUES('administrator','password'))";
if(mysqli_query($con, $sqlin))
{
    echo '<script language="javascript">';
    echo 'alert("Admin Registered")';
    echo '</script>'; 
} else{
    echo "ERROR: Could not able to execute $sqlin. " . mysqli_error($con);
}
}    

$sql = "SELECT username, password FROM admin_table WHERE username='".$_POST["username"]."' " ;
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         if($row["username"]==$_POST["username"] && $row["password"]==$_POST["login-password"]) // - Password: ". $row["password"]. "<br>";
             header("location:/ProjectSchool/admin_dashboard.php");
        else{
             echo '<script language="javascript">';
            echo 'alert("Username or password miss-match")';
            echo '</script>';
            
        }
    }
} else {
    echo "";
}
    
$con->close();
}

?>
<HTML>
<HEAD>
    <style>
        html { 
  background: url(bg6.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
        }</style>
<TITLE>Login</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="sign-up-container">
			
			<div class="signup-align">
				<form name="login" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading">Admin Login</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username"
								id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="login-password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="login-btn"
							id="login-btn" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#username").val();
	var Password = $('#login-password').val();

	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
