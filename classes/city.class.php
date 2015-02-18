<?php
	//sets the Genre table attributes
	class City 
	{
		public $id;
		public $name;
		public $description;
		public $long;
		public $lat;
		public $img;

		public function getRatings()
		{
			require('includes/db.php'); 
			require_once('classes/ratings.class.php');
		
			// get all roles for this film
			$ratings = $data->query('SELECT * FROM cityRatings WHERE cityId = '.$this->id);

			//then make and array to put roles and actors.
			//Role character is the key, actor name is value
			$ratingList = array();
			while($rating = $ratings->fetch_object('Rating')){
				// for each role - get the actor
				$ratingList[] = $rating->rating;
				
			}
			return $ratingList;
		}
	}
?>