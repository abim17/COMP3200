<?php
session_start();
require('includes/db.php'); 
try{

	if(!isset($_POST['name']) OR !is_numeric($_POST["name"])) throw new Exception('Please select a valid city as your hometown');
	$city = $data->query('SELECT * FROM city WHERE id = '.$_POST["name"]); 
	if($city->num_rows==0) throw new Exception('Please select a valid city as your hometown');
  	$cookie_value = $_POST["name"];
	setcookie('homeCity', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	header('Location: index.php');

}catch(Exception $e){

	$_SESSION['error'] =$e->getMessage();
	header('Location: chooseCity.php');
		
}

?>