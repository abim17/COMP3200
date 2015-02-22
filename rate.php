<?php
session_start();
require('includes/db.php');
$_SESSION['rated']='true';
$review = $data->query("INSERT INTO cityRatings (rating, cityId) VALUES (".$_POST['rate'].", ".$_POST['city'].")");
header('Location: moreinfo.php?id='.$_POST["city"]);
?>