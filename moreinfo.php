<?php require('includes/header.php'); 
 require_once("classes/city.class.php");  
$city = $data->query('SELECT * FROM city WHERE id = '.$data->real_escape_string($_GET['id']))->fetch_object('City');?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container text-center">

        <h2><?=$city->name?></h2>
        <?php
            $ratings = $city->getRatings();
            $total = 0;
            foreach($ratings as $rating) {
              $total = $total + $rating;
            }
            $ratingScore =  round($total/count($ratings));
            for($i = 1; $i <= $ratingScore; $i++){
              echo('<img src="images/star.png" class="rating">');
              //http://png-1.findicons.com/files/icons/2166/oxygen/48/rating.png

            }
          ?> 

        <div class="row spacing">
          <div class="col-md-6">
                <h4 class="description"><?=$city->description?></h4>
                <br>
                  
              <form class="form-inline">
                <div class="col-lg-6">
                <h3>Step 1</h3>
               <label for="exampleInputName2">Select a date:</label>
              <div id="datepicker"></div>
   
              <script>
              $( "#datepicker" ).datepicker();
              </script>
              </div>
              <div class="form-group col-lg-6">
              <h3>Step 2</h3>
              <label for="exampleInputName2">Enter a departure time:</label><br>
              <input type="text" class="form-control" id="exampleInputName2" placeholder="24 Hour Clock">
            
            <br><br>
              <button type="submit" class="btn btn-default btn-lg">I want to visit</button>
            </div>
           
           
          </form> 
                  
             
          </div>
          <div class="col-md-6">
            <a class="btn btn-default btn-lg btnrate" href="moreinfo.php?id=<?=$id?>">Rate <?=$city->name?></a>
            <br>
              <img src="<?=$city->img?>" class="image">
          </div>
        </div>
      </div>
    </div>

    <div class="container textcontent"><div class="row">
      <?php include('partials/travel.php'); ?>
    </div>
   

      <hr>
      <div class="row">
        <div class="col-md-4">
          <img  src="images/bubble.png">
          <?php include('partials/twitter.php'); 
          //http://img1.wikia.nocookie.net/__cb20130401132639/warriorcatclansrp/images/3/3f/Illustration_of_a_cartoon_speech_bubble.png
          ?>

        
        </div>
      </div>
    </div>
       <hr>
      <footer>
        <p>&copy; Abigail Mills 2015</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
