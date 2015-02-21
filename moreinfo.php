<?php require('includes/header.php'); 
 require_once("classes/city.class.php");  
$city = $data->query('SELECT * FROM city WHERE id = '.$data->real_escape_string($_GET['id']))->fetch_object('City');?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container text-center">

        <h2><?=$city->name?></h2>
         <?php
              
              if(isset($_SESSION['rated'])&& $_SESSION['rated']=='true'){
                  //prints out a success message
                  echo "<div class='alert alert-success'>Thank you for rating</div>";
                  unset($_SESSION['rated']);
                }else{
                  echo'hi';
                }
               ?>
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

        <div class="container spacing">
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
            <a class="btn btn-default btn-lg btnrate" onclick="rate()">Rate <?=$city->name?></a>
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
            <br>
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
