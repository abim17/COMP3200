<?php

$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=tomorrow+AND+<?=$city->name?>&result_type=recent&count=2");
$tweets1 = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=weekend+AND+<?=$city->name?>&result_type=recent&count=2");


?>