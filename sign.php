 <?php 
session_start();
// define('SITEURL','http://localhost/php%20course/onlinequize/');
// header('Location:signup.php');
$host="localhost";
$user="root";
$password="";
$name="quiz2";
$con=mysqli_connect($host,$user,$password,$name);
if($con)
{
    // echo "connected";
}
else
{ 

    echo "plz check again";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
	body{background-image:url(https://e0.pxfuel.com/wallpapers/386/919/desktop-wallpaper-website-background-website-login-page-background.jpg);
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;}
	</style>
</head>
<body class="bd">
	<div class="neelu  center">
		<!-- <form action="registration.php" method="POST" enctype="multipart/form-data"> -->
		<h1 class="head">Online Examination System</h1>
		<h3 class="head">Please Signup here</h3>
		<div class="neelu1">	
		<form action="registration.php" method="POST" enctype="multipart/form-data">
			<input type="name" name="name" placeholder="Enter username" required><br>
			<input type="Password" name="pass" placeholder="Your Password" required><br>
			<input type="Password" name="pass1" placeholder="Your Confirm Password" required><br>

	</div>
	<input type="submit" name="sub" value="Signup" class="btnn center"><br><br>
	</form>
	<div class="link">Allready have an account?<a href="index.php">Login</a></div>	
	</div>

</body>
</html>