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
 		$cookie = $cookie->fetch_object('City');

		$pieces = explode("/", $_POST['datepicker']);
		$year = substr($pieces[2], 2, 3);
		$hour = substr($_POST['time'], 0,2);
		$min = substr($_POST['time'], 2,2);
		$todaymonth1 = date("m", strtotime("+1 month"));
		$todayday = date("d");
		$todaymonth = date("m");
		$todayyear = date('y');
		$time = $hour.':'.$min;


		if($year!==$todayyear || !strtotime($time)){
			$_SESSION['dateselected']='<script>alert("You selected a date that was not this year or an invalid time. Please select again");</script>';
			header('Location: moreinfo.php?id='.$_POST["city"]);
		}else if($pieces[0]!==$todaymonth && $pieces[0]!==$todaymonth1){
			$_SESSION['dateselected']='<script>alert("Please select a month within '.$todaymonth.' or '.$todaymonth1.'");</script>';
			header('Location: moreinfo.php?id='.$_POST["city"]);
		}else if($pieces[0]==$todaymonth && $pieces[1]<$todayday){
			$_SESSION['dateselected']='<script>alert("This date is in the past. Please select a valid date");</script>';
			header('Location: moreinfo.php?id='.$_POST["city"]);
		}else{
			$_SESSION['dateselected']='true';
			$_SESSION['train']='http://ojp.nationalrail.co.uk/service/timesandfares/'.$cookie->name.'/'.$_POST['to'].'/'.$pieces[1].$pieces[0].$year.'/'.$_POST['time'].'/dep';
			header('Location: moreinfo.php?id='.$_POST["city"]);
		}
  	}
 }
?>