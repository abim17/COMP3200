<?php
require('./classes/city.class.php');
class StupidTest extends \PHPUnit_Framework_TestCase
{
    public function testTrueIsTrue()
	{
	    $city = new  City();
	    $city->id = "7"; //first city in db because ratings are not stored in the class
	    //irrelevant
	    $city->name = "My hometown";
	    $city->description = "A lovely place to live";
	    $city->long = "1.00000";
	    $city->lat = "-1.0000"; 
	    $city->img = "http//:lolcatz.com";
	    $rating = $city->getRatings();
	    var_dump($rating);
	    $this->assertTrue(is_array($rating));
	    //$this->assertTrue(is_numeric($rating[0]));
	    // require_once('./partials/rating.php');
	    // $this->assertTrue(is_numeric($ratingScore));
	}
}