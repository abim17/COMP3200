<?php
session_start();
require('includes/db.php');

$rating = $_POST['rate'];
$city = $_POST['city'];

if(!is_numeric ($rating) && !is_numeric ($city)){
	$_SESSION['rated']='<div class="alert alert-danger rate">This is an invalid rating</div>';
	header('Location: moreinfo.php?id='.$_POST["city"]);
}else if(intval($rating)>5 || intval($rating)<1){
	$_SESSION['rated']='<div class="alert alert-danger rate">This is an invalid rating</div>';
	header('Location: moreinfo.php?id='.$_POST["city"]);
}else{
	$stmt = $data->prepare("INSERT INTO cityRatings (rating, cityId) VALUES (?, ?)");

	$stmt->bind_param("ii", $rating, $city);

	$stmt->execute();
	$_SESSION['rated']='<div class="alert alert-success rate">Rating Successful</div>';
	header('Location: moreinfo.php?id='.$_POST["city"]);
}

?>