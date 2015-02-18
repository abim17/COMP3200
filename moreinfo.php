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

    <div class="container textcontent">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
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
