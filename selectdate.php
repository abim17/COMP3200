<?php
session_start();
require('includes/db.php');
 require_once("classes/city.class.php"); 
$cookie;
if(!isset($_COOKIE['homeCity'])&&!is_numeric($_COOKIE['homeCity'])){
      $_SESSION['error']='Please select a valid city as your hometown';
      header('Location: chooseCity.php');
  }else{
      $cookie = $data->query('SELECT * FROM city WHERE id = '.$_COOKIE['homeCity']); 
      if($cookie->num_rows==0){
         $_SESSION['error']='Please select a valid city as your hometown';
         header('Location: chooseCity.php');
     }
     else{
     	try{
     		if(!isset($_POST['datepicker']) OR !isset($_POST['time']) OR !isset ($_POST['to'])) throw new Exception('This is an invalid form entry');
	 		
	 		//gets the name of the city with the city number in the cookie
	 		$cookie = $cookie->fetch_object('City');

	 		
	 		$date = preg_replace( "/[^0-9_]\//", "",  $_POST['datepicker']);
			$pieces = explode("/", $date);
			if(count($pieces)!==3 OR !is_numeric($pieces[0])  OR !is_numeric($pieces[1])  OR !is_numeric($pieces[2])) throw new Exception('The date you entered is invalid');
			$year = substr($pieces[2], 2, 3);
			$hour = substr($_POST['time'], 0,2);
			$min = substr($_POST['time'], 2,2);
			$todaymonth1 = date("m", strtotime("+1 month"));
			$todayday = date("d");
			$todaymonth = date("m");
			$todayyear = date('y');
			$time = $hour.':'.$min;

			//checks to make sure the times and dates are valid for Natonal Rail
			if($year!==$todayyear || !strtotime($time)) throw new Exception('You selected a date that was not this year or an invalid time. Please select again');
			if($pieces[0]!==$todaymonth && $pieces[0]!==$todaymonth1) throw new Exception('Please select a month within '.$todaymonth.' or '.$todaymonth1);
			if($pieces[0]==$todaymonth && $pieces[1]<$todayday)  throw new Exception('This date is in the past. Please select a valid date');

			$_SESSION['dateselected']='true';
			$_SESSION['train']='http://ojp.nationalrail.co.uk/service/timesandfares/'.$cookie->name.'/'.$_POST['to'].'/'.$pieces[1].$pieces[0].$year.'/'.$_POST['time'].'/dep';
			header('Location: moreinfo.php?id='.$_POST["city"]);
			
		}catch(Exception $e){
		
		//if the review upload to database fails, this message is passed back as a session to filmpage.php
		$_SESSION['dateselected'] ='<script>alert("'.$e->getMessage().'");</script>';
		header('Location: moreinfo.php?id='.$_POST["city"]);
		
		}

  	}
 }
?>