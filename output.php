 <?php 
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
}?>
<?php
 session_start();
if(!isset($_SESSION['user']))
{
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QUIZE 3</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
		body{
/*			line-height: 18%;*/
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-image: url(https://img.freepik.com/free-vector/gradient-monochromatic-abstract-background_52683-74300.jpg?w=360);
		}
		h2{
			margin-top: 10%;
			font-size: 40px;
		}
		p{
			font-size: 30px;
/*			font-weight: bold;*/
		}
		.container{
			width: auto;
			margin-left: 20%;
			margin-right: 20%;
			background-color: green;
	        border-radius: 20px 20px;
	        box-shadow: 5px 10px black;


		}
		.btnn{
			background-color: blue;
			text-decoration: none;
			border-radius: 10px 10px ;

		}
	</style>
</head>
<body class="center">
	<header>
		<div class="container">
			<!-- <h1>PHP  Quize</h1> -->
		</div>
	</header>
	<main>
		<div class="container">
			<h2 class="blink">You're Done!</h2><br><br><br>
			<h1>Congrats! You have completed the test</h1><br>
			<p>Final <strong> Score:</strong> <?php 
			$marks= $_SESSION['score']; 
			echo $marks?></p>
			<?php  unset ($_SESSION['score']);?><br><br><br>
		</div><br><br>
			<a href="question.php?n=1" class="btnn"> Take Again</a>
	</main><br><br>
	<footer>
		<div class="containerr">
		<b>	onlinequiz @neelu:2023</b>
		</div>
	</footer>
</body>
</html>


<?php
$result=0; 

$marks;
mysqli_select_db($con,'quiz2');
$name=$_SESSION['user'];
// $final="INSERT INTO user (username, totalques, answercorrect) VALUES ('$name','5','$result')";
$final="INSERT INTO `response`(`name`, `t_ques`, `t_marks`) VALUES ('$name','4','$marks')";
// echo $result;
$data=mysqli_query($con,$final);
?>