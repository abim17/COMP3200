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
    <script src="js/bootstrap.min.js"></script>
    <?php require('includes/db.php'); ?>
  </head>

  <body>

    <nav class="navbar navbar-fixed-top" id="navshape">
      <div class="row">
        <div class="col-md-8 col-md-offset-1">
          <div class="container text-center">
             <a id="title" href="index.php">Student traveller</a>
             <!--http://www.iconsdb.com/white-icons/train-icon.html-->
              <img id="icon" src='images/train.png'>
          </div>
        </div>
  
            <div class="col-md-2 col-md-offset-1">
                <h4>Hometown changed?</h4>
                   <a class="btn btn-default" href='chooseCity.php'>Change hometown</a>  
            </div>
        </div>
    </nav>
    <div class="content">


