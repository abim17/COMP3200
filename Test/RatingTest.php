<?php
require('./classes/city.class.php');
class RatingTest extends \PHPUnit_Framework_TestCase
{
    public function testRatingisValid()
	{
	    $city = new  City();
	    $city->id = "1"; //first city in db because ratings are not stored in the class
	    $rating = $city->getRatings();
	    $this->assertTrue(is_array($rating));
	    $this->assertTrue(is_numeric($rating[0]));
	    require_once('./includes/rating.php');
	    $this->assertTrue(is_numeric($ratingScore));
	    //current rating for southampton is 4
	    $this->assertTrue($ratingScore==4);
	}
}