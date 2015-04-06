<?php 
session_start();

require('includes/header.php'); 
require_once("classes/city.class.php");  
include('includes/homeCitySet.php');

if(!is_numeric($_GET['id'])){
     $_SESSION['error']='Invalid city entered';
     header('Location: chooseCity.php');
}

$city = $data->query('SELECT * FROM city WHERE id = '.$data->real_escape_string($_GET['id'])); 
if($city->num_rows==0){
      $_SESSION['error']='Invalid city entered';
     header('Location: chooseCity.php');
}
$city = $city->fetch_object('City')?>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Playball|Open+Sans+Condensed:300,700" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
 
    <div class="jumbotron">
      <div class="container">
        <div class="text-center">

          <h2><?=$city->name?></h2>
        <?php require('includes/rating.php');
        if($ratingScore>0){
           for($i = 1; $i <= $ratingScore; $i++){
                echo('<img src="images/star.png" class="rating">');
                //http://png-1.findicons.com/files/icons/2166/oxygen/48/rating.png
              }
        }
       ?>
        <script src="js/validateForm.js"></script>
        </div>
        <?php if($_COOKIE['homeCity']!==$city->id):?>
          <form class="form-inline form col-md-offset-2 col-md-8" method="post" name="myForm" action="selectdate.php" onsubmit="return validateForm(document.forms['myForm']['time'].value,document.forms['myForm']['datepicker'].value)">
              
                  <h3>Train times</h3>
                
                <div class="col-md-4">
                 
                  <label>Departure date</label>
                  <input id="datepicker" placeholder="Within this or next month" class="form-control" name="datepicker"></input>
                  <script>
                  $( "#datepicker" ).datepicker();
                  </script>
                </div>
                <div class="col-md-4">
                
                  <label>Departure time</label>
                  <input type="text" class="form-control" name="time" placeholder="e.g. 0900">
                </div>
               <div class="col-md-4">
                  <input type="hidden" name="to" value="<?=$city->name?>">
                  <input type="hidden" name="city" value="<?=$city->id?>">
                  <br>
                  <button type="submit" class="btn btn-primary">Find me trains</button>
                
                    <br>
                    <?php 
                    if(isset($_SESSION['dateselected'])&& $_SESSION['dateselected']=='true'):?>
                      <script>window.onload = function() {
                           window.open("<?=$_SESSION['train']?>");
                        }</script>
                      <a target="_blank" href="'.$_SESSION['train'].'"class="btn btn-success" type="submit">Link didn't load? Click here</a>
                      
                      <?php unset($_SESSION['dateselected']);
                    elseif(isset($_SESSION['dateselected'])):
                       echo($_SESSION["dateselected"]);
                        unset($_SESSION['dateselected']);
                    endif;


                    ?>
             </div>
              <br>
        </form> 
      <?php endif; ?>
         
        <br>
        
        
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
            
            <a class="btn btn-primary rate" onclick="rate()">Rate <?=$city->name?></a>
              <?php
                
                if(isset($_SESSION['rated'])){
                    //prints out a success message
                    echo($_SESSION['rated']);
                    unset($_SESSION['rated']);
                  }
                 ?>
              <form name="myform" class="vis form" id="rate" action="rate.php" method="POST">
                <input type="radio" name="rate" value="1" checked>1
                <input type="radio" name="rate" value="2">2
                <input type="radio" name="rate" value="3">3
                <input type="radio" name="rate" value="4">4
                <input type="radio" name="rate" value="5">5
                <input type="hidden" name="city" value="<?=$city->id?>">
                <div class="g-recaptcha" data-sitekey="6Lfs2QITAAAAAOjIrg3A2k1ZdclwSu4osw78MZ6Y"></div>
                <input class="btn btn-primary" type="submit" value="submit">
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
     
          <?php 
          include('includes/twitterconn.php'); 
          include('includes/twitter.php'); 
          echo "   <div class='col-md-4'><div class='bubble'><h3>Tomorrow</h3>";
          for ($i = 0; $i < 2; $i++) {
           
           $text = (json_encode($tweets->statuses[$i]->text));
           require('includes/twitterValidation.php'); 
           
          echo substr(json_encode($tweets->statuses[$i]->created_at),5,12);
            echo (" - ".$pieces[1]."<br>");
           
           if($link!==null){
                echo("<a target='_new' href='".$link[0]."'>".$link[0]."</a> ");
                echo($link[1]);
            } 
           //echo ($text.' - ');
           //echo substr(json_encode($tweets->statuses[$i]->created_at),5,12);
           echo '<br><br>';

          }
           echo "<a target='_new' class='btn btn-primary' href='https://twitter.com/search?q=tomorrow%20".$city->name."&src=typd&lang=en'>Find out more on Twitter</a></div></div><div class='col-md-4 text-center'><h2>Twitter trends</h2><img src='images/student.png'></div><div class='col-md-4'><div class='bubble'><h3>The weekend</h3>";

          for ($i = 0; $i < 2; $i++) {
           
             $text = (json_encode($tweets1->statuses[$i]->text));
            require('includes/twitterValidation.php'); 
             echo substr(json_encode($tweets1->statuses[$i]->created_at),5,12);
             echo (" - ".$pieces[1]."<br>");
             
             if($link!==null){
                  echo("<a target='_new' href='".$link[0]."'>".$link[0]."</a> ");
                  echo($link[1]);
              } 
             echo '<br><br>';

          }
          echo "<a target='_new' class='btn btn-primary' href='https://twitter.com/search?q=weekend%20".$city->name."&src=typd&lang=en'>Find out more on Twitter</a>";
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
