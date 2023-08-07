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
}
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:index.php');
}
 ?>


 <?php 
//get the total no of question
 $query="SELECT * FROM question";

 //get results
$result=mysqli_query($con,$query);
$total=$result->num_rows;
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QUIZE 3</title>

	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="index.css">

	<style type="text/css">

		body{
				background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-image: url(https://us.123rf.com/450wm/meshcube/meshcube2303/meshcube230300027/199625226-conceptual-background-with-an-alarm-clock-on-a-desk-for-studying-for-a-test-3d-rendering.jpg?ver=6);
		}

		ul li{
	list-style: none;

}
header{
	border-bottom: 3px solid #d7d9db;
/*	margin-left: 30%;*/
    font-size: 40px;


}
footer{
	border-top: 3px solid #d7d9db;
	text-align: center;
	padding-top:5px ;
}
main{
/*	padding: 2%;*/
	padding-bottom:20px ;
	font-size: 20px;
	margin-left: 30%;
/*	text-indent: 40px;*/
line-height: 1.8;

}
.ok a{
	text-decoration: none;
	display: inline-block;
	background-color: green;
	padding: 1%;
	color: white;
	border-radius: 7px 7px;
}
@media only screen and (max-width:960px){
	.neelu{
		width: 80%;
	}
}

.neelu{

font-family:sans-serif;
	
}
.kumari{
	margin-top: 2%;
	width: 80%;
	margin-left: 10%;
	margin-right: 10%;


}
.blink{
	animation:blinkingText 1.1s infinite;
	font-weight: 700;
}
@keyframes blinkingText{
	0%{ color:red; }
	30%{ color:brown; }
	49%{ color:green; }
	55%{ color:yellowgreen; }
	60%{ color:blue; }
	70%{ color:yellow; }
	80%{ color:pink; }
	99%{ color:orange; }


}
.start:hover{
	background-color: darkgreen;

}
	</style>
</head>

<body class="kumari">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">QUIZONE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Add Admin</a></li>
            <li><a class="dropdown-item" href="add_ques.php">Add questions</a></li>
          </ul>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">LOGOUT</a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav><br>
	<header>
		<div class="center">
			<!-- <h1 class="blink">Online  Quiz</h1> -->
        <!-- <h1 class="blink" >Welcome to QUIZE  ZONE.</h1> -->

      <h1 class="blink">WELCOME to QUIZONE  <?php echo $_SESSION['user']; ?></h1>

		</div>
	</header>
	<main>
		<div class="head">
			<h2>Test your  knowledge</h2>
			<p>This is a multiple choice quize to test your knowledeg of php.</p>
			<ul>
				<li><strong>Number of Questions:</strong><?php echo $total; ?></li>
				<li><strong>Type:</strong>Multiple Choice</li>
				<li><strong>Estimated Time:</strong><?php echo $total * .5; ?></li>
			</ul><br>
			<div class="ok">
			<a href="question.php?n=1" class="start"> Start Quize</a>

		</div>
		</div>
	</main>
	<footer>
			 <div>
        <!-- <h4 class="text-center">@2023neeluchauhan</h4> -->
		<b>	phpquize @neelu:2023</b>
        
    </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

	</footer>
</body>
</html>