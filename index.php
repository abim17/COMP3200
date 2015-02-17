<?php require('assets/templates/header.php'); ?>
    <!-- MAPS JAVASCRIPT -->
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKNLzBPpD3hKCpe78Fhq9ZQLui9U8yVl8">
    </script>
    <?php 
    if(!isset($_COOKIE['homeCity'])){
      header('Location: chooseCity.php');
    }
  
       $query = $data->query("SELECT * FROM city"); 
       $city_data = array();
       while($city = $query->fetch_assoc()): 
            $city_data[] = $city; 
        endwhile;
    ?>
  
    <style type="text/css">
    /** FIX for Bootstrap and Google Maps Info window styes problem **/
    img[src*="gstatic.com/"], img[src*="googleapis.com/"] {
    max-width: none;
    }
    </style>


        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Pick your destination</h3>
              
                       <a href='chooseCity.php'>Change hometown</a>  
                </div>
       
            </div><!-- /row -->
        </div> <!-- /container -->

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
        //gets all the details of the selected city
        foreach($city_data as $city): 
        $name = $city['name']; 
        $description = $city['description'];
        $lat = $city['lat'];
        $long = $city['long'];
        $marker = $name.'marker';
        $info = $name.'info';
        $id = $city['id'];
        ?>

        //creating each cities marker and pop up box
        var myLatlng1 = new google.maps.LatLng(<?=$long?>, <?=$lat?>);
        var <?= $marker ?> = new google.maps.Marker({
        position: myLatlng1,
        map: map,
        title: '<?=$name?>',
        raiseOnDrag: true,
        labelContent: "<?=$description?>",
        <?php if($_COOKIE['homeCity']==$name):?>
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
        <?php endif; ?>
        });
        //content displayed when the info window pops up
        var contentString = "<h3><?=$name?></h3><p><?=$description?></p><a class='btn btn-primary' id='moreInfo' href='moreinfo.php?id=<?=$id?>'>Find out more</a>";


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
  
<?php require('assets/templates/footer.php'); ?>
