<?php
session_start();
require('includes/db.php');
$_SESSION['dateselected']='true';
echo($_POST['time']);
echo($_POST['datepicker']);
//header('Location: moreinfo.php?id='.$_POST["city"]);
?>