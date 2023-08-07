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
    if(isset($_SESSION['add']))
    {
      echo $_SESSION['add'];  //use to display session messge
      unset($_SESSION['add']); //use to remove session massge
    }
    if(isset($_SESSION['repeat']))
    {
      echo $_SESSION['repeat'];  //use to display session messge
      unset($_SESSION['repeat']); //use to remove session massge
    }


    

mysqli_select_db($con,'quiz2');
$name=$_POST['name'];
$pass=$_POST['pass'];
$pass1=$_POST['pass1'];


$insert="select * from sign where name='$name' && pass='$pass'";
 $result= mysqli_query($con,$insert);
 $num=mysqli_num_rows($result);
 if($num==1)
 {
 	echo "duplicate data";

   		// echo"data inserted in db";
   		$_SESSION['repeat']="<div class='color2'>Duplicate data exist.</div>";
   		//redirect page
		header("Location:sign.php");
 }
 else
 {
 	$insert1="insert into sign(name,pass,c_password) values('$name','$pass','$pass1')";
 	mysqli_query($con,$insert1);

   		// echo"data inserted in db";
   		$_SESSION['add']="<div class='color'>User Signin Successfully.</div>";
   		//redirect page
		header("Location:sign.php");
 }

 ?>