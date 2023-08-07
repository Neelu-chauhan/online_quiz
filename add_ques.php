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
?>
<?php session_start() ?>
<?php 
if(isset($_POST['submit']))
{
	// echo"yes submited";

	$question_number=$_POST['question_number'];
	$question_text=$_POST['question_text'];
	$correct_choice=$_POST['correct_choice'];

	//options 
	$options=array();
	$options[1]=$_POST['choice1'];
	$options[2]=$_POST['choice2'];
	$options[3]=$_POST['choice3'];
	$options[4]=$_POST['choice4'];
	$options[5]=$_POST['choice5'];

	//query for question

	// $query="INSERT INTO `question`(`question`, `text`) VALUES ('$question_number','$question_text')";
	$query="INSERT INTO `question`(`question`, `text`, `a_id`) VALUES ('$question_number','$question_text','$correct_choice')";

	$data=mysqli_query($con,$query);


	//validate insert

	if($data){
		// echo "question has been inserted";
		foreach($options as $choice=> $value){
			if($value!=''){
				if($correct_choice==$choice){
					$is_correct=1;
				    }
					else{
						$is_correct=0;
					}
					$query="INSERT INTO `options`(`question`, `is_correct`, `text`) VALUES ('$question_number','$is_correct','$value')";
						// "INSERT INTO`options`(`question`,`is_correct`,`text`) VALUES ('$question_number','$is_correct','$values')";

						$data=mysqli_query($con,$query);
						//validate
						if($data)
						{
							continue;
						}
						else
						{
							die('Error : ('.mysqli->errno.') '. $mysqli->error);
						}
					}

			
			}
			$msg='Question has been added.';
		}
	}

	//get total questions
	$query="SELECT * FROM `question`";
	$data=mysqli_query($con,$query);
	$total=$data->num_rows;
	$next=$total+1;

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QUIZE 3</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="index.css">
	<style>
		body{
				background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
/*	background-image: url(https://swall.teahub.io/photos/small/198-1989210_books-pen-and-laptop.jpg);*/
	background-image: url(https://img.freepik.com/premium-photo/concept-preapring-exams-tests_185193-80188.jpg?w=2000);



		}
		label{
	display: inline-block;
	width: 180px;
	font-weight: bold;
}

input[type='text']{
	width: 97%;
	padding: 4px;
	border-radius: 5px;
	border: 1px solid #ccc;
}
input[type='number']{
	width: 50px;
	padding: 5px;
	border-radius: 5px;
	border: 1px solid #ccc;
}
	</style>
</head>
<body>
	<header>
		<div class="container">
			<h1><b>Online  Quize</b></h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Add A Question</h2>
			<?php 

			if (isset($msg)) {
			 	// code...
			 	echo '<p>'.$msg.'</p>';
			 } ?>
			<form action="add_ques.php" method="POST">
				<p>
					<label>Question Number:</label>
					<input type="number" name="question_number" value="<?php echo $next; ?>" placeholder="Write a Question">
				</p>
					<p>
					<label>Question Test</label>
					<input type="text" name="question_text">
				</p>
				    <p>
					<label>Choice #1:</label>
					<input type="text" name="choice1">
				</p>
					<p>
					<label>Choice #2:</label>
					<input type="text" name="choice2">
				</p>
					<p>
					<label>Choice #3:</label>
					<input type="text" name="choice3">
				</p>
					<p>
					<label>Choice #4:</label>
					<input type="text" name="choice4">
				</p>
				<p>
					<label>Choice #5:</label>
					<input type="text" name="choice5">
				</p>
				<p>
					<label>Correct choice number:</label>
					<input type="number" name="correct_choice">
				</p>
				<p>
					<input type="submit" name="submit" value="Submit" class="btnn">
				</p>
			</form>
		</div>
	</main>
	<footer>
		<div class="container center">
		<b>	phpquize @neelu:2023</b>

		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>