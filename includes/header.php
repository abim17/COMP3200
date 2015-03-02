<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Student Traveller</title>

    <!-- Bootstrap core CSS -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
     <link href="css/skeleton.css" rel="stylesheet">
    <script src="js/bootstrap.min.js">
   </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>

<script src="js/jquery.zweatherfeed.min.js" type="text/javascript"></script>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    <?php require('includes/db.php'); ?>

    <nav class="navbar" id="navshape">
 
        <div class="col-md-7 col-md-offset-1">
     
             <a id="title" href="index.php">Student traveller</a>
             <!--http://www.iconsdb.com/white-icons/train-icon.html-->
              <img id="icon" src='images/train.png'>
          </div>
             <div class="col-md-2">
              <?php
              if(isset($_COOKIE['homeCity'])){
                print('<a type="button" href="index.php" class="gohome btn btn-default" >Back to map</a>');
              }?>
           
         </div>
            <div class="col-md-2 ">
               <?php
              if(isset($_COOKIE['homeCity'])){
                print('<h4>Hometown changed?</h4>
                   <a class="btn btn-default" href="chooseCity.php">Change hometown</a>  ');
              }?>
            </div>
    </nav>

    <div class="content">

<script>
(document).ready(function(){
  
  //Click event to scroll to top
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
  
});
</script>
