 <?php 
session_start();
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


 <?php 
//set question number 
 $number=(int) $_GET['n'];

 //get the question
 $query="SELECT * FROM `question` WHERE question=$number ";
 //get resullt

 $result=mysqli_query($con,$query);
 $question=mysqli_fetch_assoc($result);


 // get choices
$query="SELECT * FROM `options` WHERE question=$number";
 $choice=mysqli_query($con,$query);

 $query="SELECT * FROM question";
 $total=mysqli_num_rows(mysqli_query($con,$query));
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QUIZE 3</title>
	<link rel="stylesheet" type="text/css" href="index.css">

	<style type="text/css">
		@media only screen and (max-width:960px){
	.que{
		width: 80%;
     	}
       }
		
		body{
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-image: url(https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-preparing-for-the-college-entrance-examination-college-entrance-examination-sprint-poster-image_192440.jpg);
	}
	ul li{
/*		text-decoration: none;*/
		list-style: none;
		font-weight: bold;
	}
	.que{
	    font-family:sans-serif;
	    font-size: 20px;
		line-height: 1.8;
		width: 40%;
		margin-left: 30%;
		margin-right: 30%;
/*		background-color:gray;*/
		padding: 3%;
		margin-top: 3%;
		font-weight: bold;

/*		height: 3px;*/

	}
	.current{
		color: white;
/*		background-color:lightblue;*/
        display: block;
		width: 80%;
/*		margin-left: 15%;*/
		margin-right: 15%;
		border: 2px dotted black;
		text-align: center;
	}
	@media only screen and (max-width:960px){
	body{
		width: 80%;
	}
}

.start{
	background-color: blue;
	padding: 1%;
	color: white;
	width: 18.1%;



}
	</style>
</head>
<body>
	<div class="que">
	<header>
		<div class="container">
			<h1>PHP  Quize</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">
				Question <?php echo $number; ?> of <?php echo $total;?> 
			</div><br>
			<p class="Question">
			Q.<?php echo $question['text'];?> 
			</p>
			<form action="process.php" method="POST" >
				<ul class="choices">
					<?php while ($row=mysqli_fetch_assoc($choice)):?>
					<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"> <?php echo $row['text'];?></li>
				<?php endwhile; ?>
						

				</ul>
				<input type="hidden" name="number" value=" <?php echo $number; ?>">
				<input type="submit" name="submit" value="submit" class="start">
			</form>
		</div>
	</main>
</div>
	<footer>
		<div class="container center">
		<b>	phpquize @neelu:2023</b>
		</div>
	</footer>

</body>
</html>
