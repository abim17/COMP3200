<?php

$cookie_value = $_POST["name"];

setcookie('homeCity', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

header('Location: index.php');

?>