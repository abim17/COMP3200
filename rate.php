<?php
session_start();
require('includes/db.php');

try{
		// check that the ID exists and it is the correct type
		if(!isset($_POST['g-recaptcha-response']) OR !isset($_POST['city']) OR !isset($_POST['rate']) OR !is_numeric ($_POST['rate']) OR !is_numeric($_POST['city'])) throw new Exception('This is an invalid rating');
		$captcha=$_POST['g-recaptcha-response'];
		$rating = $_POST['rate'];
		$city = $_POST['city'];
		if(intval($rating)>5 || intval($rating)<1) throw new Exception('Rating must be withing 1 and 5');
		if(!$captcha) throw new Exception('Please check the captcha form.');
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfs2QITAAAAAJn5FaPCYg1xMKRX-ks_4MtgxJar&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		if($response.success==false) throw new Exception('Please check the captcha form');
		
        $stmt = $data->prepare("INSERT INTO cityRatings (rating, cityId) VALUES (?, ?)");
		$stmt->bind_param("ii", $rating, $city);
		$stmt->execute();
		
		$_SESSION['rated']='<div class="alert alert-success rate">Rating Successful</div>';

		header('Location: moreinfo.php?id='.$_POST["city"]);
	}
	catch(Exception $e){
		
		//if the review upload to database fails, this message is passed back as a session to filmpage.php
		$_SESSION['rated'] ='<div class="alert alert-danger rate">'.$e->getMessage().'</div>';
		header('Location: moreinfo.php?id='.$_POST["city"]);
		
	}
?>