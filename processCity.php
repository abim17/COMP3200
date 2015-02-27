<?php
session_start();
require('includes/db.php'); 
if(!is_numeric($_POST["name"])){
  $_SESSION['error']='Please select a valid city as your hometown';
  header('Location: chooseCity.php');
}else{
	$city = $data->query('SELECT * FROM city WHERE id = '.$_POST["name"]); 
	if($city->num_rows==0){
	   $_SESSION['error']='Please select a valid city as your hometown';
	   header('Location: chooseCity.php');
	  }else{
	  	$cookie_value = $_POST["name"];
		setcookie('homeCity', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header('Location: index.php');
	  }
}

?>