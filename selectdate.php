<?php
session_start();

$_SESSION['dateselected']='true';

$pieces = explode("/", $_POST['datepicker']);
$year = substr($pieces[2], 2, 3);
$date = $pieces[0] + $pieces[1] + $year;
$_SESSION['train']='http://ojp.nationalrail.co.uk/service/timesandfares/'.$_COOKIE['homeCity'].'/'.$_POST['to'].'/'.$pieces[0].$pieces[1].$year.'/'.$_POST['time'].'/dep';

header('Location: moreinfo.php?id='.$_POST["city"]);
?>