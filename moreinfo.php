<?php 
session_start();
require('includes/header.php'); 
 require_once("classes/city.class.php");  
$city = $data->query('SELECT * FROM city WHERE id = '.$data->real_escape_string($_GET['id']))->fetch_object('City');?>

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Playball|Open+Sans+Condensed:300,700" />
 
    <div class="jumbotron">
      <div class="container">
        <div class="text-center">

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
        </div>
        <div class="container spacing">
          <div class="col-md-5 col-md-offset-1">
                <h4 class="description"><?=$city->description?></h4>
               
                 <div id="test"></div>
                <script type="text/javascript">
                //http://www.zazar.net/developers/jquery/zweatherfeed/
                //http://uk.weather.com/weather/today/Southampton+STH+United+Kingdom+UKXX0138:1:UK
                 $('#test').weatherfeed(['<?=$city->location_ID?>'], {

                    forecast: true
                  });
               
                </script>
                  
             
          </div>
          <div class="col-md-5 col-md-offset-1">
              <?php
                
                if(isset($_SESSION['rated'])&& $_SESSION['rated']=='true'){
                    //prints out a success message
                    echo "<div class='rate text-center alert alert-success'>Thank you for rating ".$city->name."</div>";
                    unset($_SESSION['rated']);
                  }
                 ?>
            <a class="btn btn-default btn-lg rate" onclick="rate()">Rate <?=$city->name?></a>
            <form name="myform" class="vis" id="rate" action="rate.php" method="POST">
                <input type="radio" name="rate" value="1" checked>1
                <input type="radio" name="rate" value="2">2
                <input type="radio" name="rate" value="3">3
                <input type="radio" name="rate" value="4">4
                <input type="radio" name="rate" value="5">5
                <input type="hidden" name="city" value="<?=$city->id?>">
                <input class="btn btn-default" type="submit" value="submit">
              </form>
               
               <script>
                function rate(results){
                  $('#rate').toggle();
                }
                </script>
           
              <img src="<?=$city->img?>" class="image">
          </div>
        </div>
      </div>
    </div>

    <div class="container textcontent">
      <div class="container_12">
  
  
        

      <?php include('partials/travel.php'); ?>

      <script>


   function clicked(results){
        var toggle = "#"+results;
        console.log(toggle);
         $(toggle).toggle();
      }
      </script>
    </div>
   


      <div class="container_12">
     
          <?php include('partials/twitter.php'); 
          //http://img1.wikia.nocookie.net/__cb20130401132639/warriorcatclansrp/images/3/3f/Illustration_of_a_cartoon_speech_bubble.png
          ?>

        <a href="#" class="scrollToTop">Scroll To Top</a>
        </div>
      </div>
    </div>
    <?php include('includes/footer.php');?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
