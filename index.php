<?php 
session_start();
require('includes/header.php'); ?>

    <!-- MAPS JAVASCRIPT -->
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKNLzBPpD3hKCpe78Fhq9ZQLui9U8yVl8">
    </script>
    <?php 
    if(!isset($_COOKIE['homeCity'])&&!is_numeric($_COOKIE['homeCity'])){
        $_SESSION['error']='Please select a valid city as your hometown';
        header('Location: chooseCity.php');
    }else{
        $cookie = $data->query('SELECT * FROM city WHERE id = '.$_COOKIE['homeCity']); 
        if($cookie->num_rows==0){
           $_SESSION['error']='Please select a valid city as your hometown';
           header('Location: chooseCity.php');
       }
    }
   $query = $data->query("SELECT * FROM city"); 
   $city_data = array();
   while($city = $query->fetch_assoc()): 
        $city_data[] = $city; 
    endwhile;
    require('partials/twittermap.php'); 
    ?>
  
    <style type="text/css">
    /** FIX for Bootstrap and Google Maps Info window styes problem **/
    img[src*="gstatic.com/"], img[src*="googleapis.com/"] {
    max-width: none;
    }
    </style>

        <!-- http://maplacejs.com/images/red-dot.png -->
       <div class="text-center key"><img src="images/red-dot.png" class="pin"> = City location <img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png"> = Your location</div>

</div>
    <script type="text/javascript">
        function initialize() {
        
        var myLatlng = new google.maps.LatLng(52.029835, -0.745842);
        
        var mapOptions = {
          //selects the zoom and center default of the map
          center: myLatlng,
          zoom: 7
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
        <?php 
         require_once("classes/city.class.php"); 
        //gets all the details of the selected city
        foreach($city_data as $citymark): 
            $name = $citymark['name']; 
            $description = $citymark['description'];
            $lat = $citymark['lat'];
            $long = $citymark['long'];
            $marker = $name.'marker';
            $info = $name.'info';
            $id = $citymark['id'];
            $city = $data->query('SELECT * FROM city WHERE id = '.$citymark['id'])->fetch_object('City');
            $rating;
            require('partials/rating.php'); 
            for($i = 1; $i <= $ratingScore; $i++){
                $rating = $rating."<img src='images/star.png' class='rating'>";
                  }
            $rating = substr($rating, 1);
           
            $tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q==tomorrow+AND+<?=$city->name?>&result_type=recent&count=2");
            $tweets1 = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=weekend+AND+<?=$city->name?>&result_type=recent&count=2");

            $text = (json_encode($tweets->statuses[0]->text));
            $text = explode('"', $text);
            
            $datecreated = substr(json_encode($tweets->statuses[0]->created_at),5,12);
          
            $text1 = (json_encode($tweets1->statuses[0]->text));
            $text1 = explode('"', $text1);   
            $datecreated1 = substr(json_encode($tweets1->statuses[0]->created_at),5,12);                                 

                        
            ?>
            //creating each cities marker and pop up box
            var myLatlng1 = new google.maps.LatLng(<?=$long?>, <?=$lat?>);
            var <?= $marker ?> = new google.maps.Marker({
            position: myLatlng1,
            map: map,
            title: '<?=$name?>',
            raiseOnDrag: true,
            labelContent: "<?=$description?>",
            <?php if($_COOKIE['homeCity']==$id):?>
            icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
            <?php endif; ?>
            });
            //content displayed when the info window pops up
            var contentString = "<div class='col-md-4'><img src='<?=$city->img?>' class='imagepopup'></div>"
            +"<div class='col-md-8'><h3><?=$name?> <?=$rating?></h3>"
            +"<p>Talk about tomorrow from <?=$datecreated?>: <?=$text[1]?></p><p>Talk about the weekend from <?=$datecreated1?>: <?=$text1[1]?></p>"
            +"<a class='btn btn-default' id='moreInfo' href='moreinfo.php?id=<?=$id?>'>Find out more</a></div>";


            var <?=$info?> = new google.maps.InfoWindow({
                content: contentString
            });
              google.maps.event.addListener(<?= $marker ?>, 'click', function() {
        
              <?=$info?>.open(map,<?= $marker ?>);
                     

            });
        <?php endforeach; ?>
        
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
    <script src="assets/js/modernizr.js"></script>

    <div id="map-canvas"></div>
  
<?php require('includes/footer.php'); ?>
