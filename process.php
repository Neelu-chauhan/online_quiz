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
session_start();
 ?>
 <?php 
    // echo "i have been submitted";
 //check error
 if(!isset($_SESSION['score']))
 {
    $_SESSION['score']=0;
 }
 
    $query="SELECT * FROM question";
    // $results=mysqli_fetch_assoc(mysqli_query($con,$query));
    $total=mysqli_num_rows(mysqli_query($con,$query));

    $number=$_POST['number'];
    $select_choice=$_POST['choice'];
    $next=$number+1;



    // get correct choice
    $query="SELECT * FROM `options` WHERE question=$number AND is_correct=1";

    //get results 
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);

    //correct choice
    $correct_choice=$row['id'];
    


    //compare or increse


    if($select_choice==$correct_choice)
    {
        $_SESSION['score']++;
    }
    //redirect if question is last
    if($number==$total){
        header("location: output.php");

    }
    else
    {
        header("location: question.php?n=".$next);
    }
  ?>
