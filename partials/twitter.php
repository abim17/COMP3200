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

$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=tomorrow+AND+event+AND+<?=$city->name?>&result_type=recent&count=2");
$tweets1 = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=weekend+AND+event+AND+<?=$city->name?>&result_type=recent&count=2");

 echo "   <div class='col-md-4'><div class='bubble'><h3>Tomorrow</h3>";
for ($i = 0; $i < 2; $i++) {
 
 $text = (json_encode($tweets->statuses[$i]->text));
 $pieces = explode("http", $text);
 echo $pieces[0];
 echo '"<br><br>';
}
 echo "</div></div><div class='col-md-4 text-center'><h2>Twitter trends</h2><img src='images/student.png'></div><div class='col-md-4'><div class='bubble'><h3>This weekend</h3>";

for ($i = 0; $i < 2; $i++) {
 
 $text = (json_encode($tweets1->statuses[$i]->text));
 $pieces = explode("http", $text);
 echo $pieces[0];

  echo '"<br><br>';

}

?>