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

$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=tomorrow+AND+leeds&result_type=recent&count=10");
$tweets1 = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=weekend+AND+leeds&result_type=recent&count=10");


for ($i = 0; $i < 10; $i++) {
 
 $text = (json_encode($tweets->statuses[$i]->text));
 $pieces = explode("http", $text);
 echo $pieces[0];
 echo substr(json_encode($tweets->statuses[$i]->created_at),5,12);
 echo "<br>";
}
 echo "<br>"; echo "<br>";
for ($i = 0; $i < 10; $i++) {
 
 $text = (json_encode($tweets1->statuses[$i]->text));
 $pieces = explode("http", $text);
 echo $pieces[0];
 echo substr(json_encode($tweets1->statuses[$i]->created_at),5,12);
 echo "<br>";
}

?>