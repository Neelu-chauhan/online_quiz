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
mysqli_select_db($con,'quiz2');
$name=$_POST['name'];
$pass=$_POST['pass'];
$pass1=$_POST['c_password'];

$insert="select * from sign where name='$name' && pass='$pass'";
 $result= mysqli_query($con,$insert);
 $num=mysqli_num_rows($result);
 if($num==1)
 {
    echo "duplicate data";
        //redirect page
    $_SESSION['user']=$name;
        header("Location:afterlogin.php");
 }
 else
 {
        header("Location:afterlogn.php");
 }

 ?>