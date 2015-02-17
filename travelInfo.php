<?php require('assets/templates/header.php');
 require_once("city.class.php");	 ?>

<?php 

$city = $data->query('SELECT * FROM city WHERE id = '.$data->real_escape_string($_GET['id']))->fetch_object('City');

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/start/jquery-ui.css">

<div id="headerwrap">
	    <div class="container">
	    	<div class="row left">
				
				<a class="btn btn-primary" id="moreInfo" href="index.php">MAP</a> > <a class="btn btn-primary" id="moreInfo" href="moreinfo.php?id=<?=$city->id?>"><?=$city->name?></a> > Booking helper
			</div>
			<div class="row">
				
				<div class="col-lg-6 col-lg-offset-1">
					
						<h1><?=$city->name?> booking helper</h1>
				</div>
				<div class="row">
					<form class="form-inline">
						<div class="col-lg-4 col-lg-offset-3 left">
							<h3>Step 1</h3>
							 <label for="exampleInputName2">Select a date:</label>
							<div id="datepicker"></div>
	 
							<script>
							$( "#datepicker" ).datepicker();
							</script>
						</div>
					  <div class="form-group col-lg-5 left">
					  	<h3>Step 2</h3>
					    <label for="exampleInputName2">Enter a departure time:</label><br>
					    <input type="text" class="form-control" id="exampleInputName2" placeholder="24 Hour Clock">
					    <button type="submit" class="btn btn-default">Submit</button>
					  </div>
					 
					 
					</form>
				</div>
				</div>
			</div>
		</div>
</div>

<?php require('assets/templates/footer.php'); ?>