<?php require('assets/templates/header.php');
 require_once("city.class.php");	 ?>

<?php 

$city = $data->query('SELECT * FROM city WHERE id = '.$data->real_escape_string($_GET['id']))->fetch_object('City');



?>
<div id="headerwrap">
	    <div class="container">
	    		<div class="row left">
				
				<a class="btn btn-primary" id="moreInfo" href="index.php">MAP</a> > <?=$city->name?>
			</div>
			<div class="row">
				<div class="col-lg-12 col-lg-offset-2 left">
						<h1><?=$city->name?></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 left col-lg-offset-2">
						<?php
						$ratings = $city->getRatings();
						$total = 0;
						foreach($ratings as $rating) {
						  $total = $total + $rating;
						}
						$ratingScore =  round($total/count($ratings));
						for($i = 1; $i <= $ratingScore; $i++){
							echo('<img src="assets/img/star.png" class="rating">');
						}
					?>

						<h5><?=$city->description?></h5>
						<br>
					<h5>Visited <?=$city->name?>? <a class="btn btn-primary" id="moreInfo" href="moreinfo.php?id=<?=$id?>">Rate it</a></h5>

						<a class="btn btn-primary" id="moreInfo" href="travelInfo.php?id=<?=$city->id?>">I want to visit</a>
					<br>
								
				</div>
				<div class="col-lg-4 col-lg-offset-1 himg">
					
					<img src="<?=$city->img?>" class="img-responsive">
					<br>
				</div>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /headerwrap -->

	<!-- *****************************************************************************************************************
	 SERVICE LOGOS
	 ***************************************************************************************************************** -->
	 <div id="service">

	 	<div class="container">
	 		
 			<div class="row centered">
 				<h2>Attractions</h2>
 				<br>
 				<?php include('travel.php'); ?>
 								
	 		</div>
	 	</div><! --/container -->
	 </div><! --/service -->

	<!-- *****************************************************************************************************************
	 MIDDLE CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container">
	 	<div class="row centered">
	 		
		 		<h2 >Talk on Twitter</h2>
		 		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
 				
	 	
	 		
	 		
	 		
	 	</div><! --/row -->
	 </div><! --/container -->
	 


<?php require('assets/templates/footer.php'); ?>
