<?php 
include 'script.php';
$con = db_connect();

//handle score persistance

$name = null;
$score = null;

if (array_key_exists('name', $_POST) && $_POST['name'] !== '') {
	$name = $_POST['name'];
}

if (array_key_exists('score', $_POST) && (int)$_POST['score'] > 0) {
	$score = (int)$_POST['score'];
}

if($name!=null && $score != null){

	$name = mysqli_real_escape_string($con,$name);
	$score = mysqli_real_escape_string($con,$score);
	$name2 = strpos($name, '<');
	$name3 = strpos($name, '>');
	if($name2 == false && $name3 == false)
	{
		mysqli_query($con,"INSERT into score (`name`,`score`) VALUES ('$name','$score')");
	}
}

//select the results

query_all($con);
//echo json_encode(array('name' => $name, 'score' => $score));



	
	
	
	
	
	
	
	
	
	
	
