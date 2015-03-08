<?php
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "cutexqueeny";
$notweets = 30;
$consumerkey = "K3FjauSkWdSFM88gcercvUc7F";
$consumersecret = "nozzlCtR48AQPoXbZMCThxNxsGEcMx4LAqsIqVkHzPKHSpCxk8";
$accesstoken = "2815379726-o8qrX2niS6wfoJkVn3Nr3f0YUMEieJpIRvMPDw3";
$accesstokensecret = "59fVU1l1WaLhTpaBKbuWzzDEO7R8h2oz8lKGx01iV9NSd";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);



?>