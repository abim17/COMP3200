
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>


<script type="text/javascript">

    var map;
    var infowindow;

  function getItems(targetDiv) {
     
    var lat = new google.maps.LatLng(<?=$city->long?>, <?=$city->lat?>);

    map = new google.maps.Map(document.getElementById('map'), {
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    });

    var request = {
      location: lat,
      radius: 10000,
      query: ['entertainment']
    };
    infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    service.textSearch(request, callback);
    var requestDet = {
      placeId: 'ChIJb9gysLF2dEgR81lqnq80s_Q'
    };

    service.getDetails(requestDet, callback1);

    function callback1(place, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        console.log(place);
      }
    }
  }

  function callback(results, status) {
    
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      html = '';
      for (var i = 0; i < 3; i++) {
        if (typeof results[i] !== 'undefined') {
         var img='<img src="images/no-image.png" class="opacity" >'; 
          if(results[i].photos !== undefined){
            img ='<img src="'+results[i].photos[0].getUrl({'maxWidth': 300, 'maxHeight': 400})+'" class="opacity" alt="">'; 
          }
          html += '<div class="grid_4">' +
          '<div class="banner">'+ img + '<div class="label"> <div class="title activities">'
          + results[i].name 
          + '</div><div class="activities price">of 5<span>'+results[i].rating+'</span></div><br><button class="btn btn-default" onclick="clicked('+"'"+i+"a'"+')">Learn More</button></div></div><div class="vis activities" id="'+i+'a">'+results[i].formatted_address+'</div></div>';
          /*<dl class="left wordwrap dl-horizontal"><dt>Rating</dt><dd>This attraction has been rated '
          +results[i].rating+' out of a possible 5.</dd> <dt>Address</dt><dd>'
          +results[i].formatted_address+'</dd><dt>Type</dt><dd>'
          +results[i].types+'</dd></dl></div>'+
          '<dt>Photos</dt><dd>'
          +'<img src="'+results[i].photos[0].getUrl({'maxWidth': 200, 'maxHeight': 200})+'">'
          +'</dd>'*/
         
        }
        //get extra details
        //console.log(results[i]);
        
      }
      html += '';  
      $('#item-list').html(html);
    }
  }
  google.maps.event.addDomListener(window, 'load', getItems);

       

</script>
<!-- GOOGLE PLACES SEARCH PAGE ONE -->

<!-- https://forums.html5dev-software.intel.com/viewtopic.php?f=28&t=1898 -->
<div id="item-list"></div>
<div id="map" style="visibility:hidden;"></div>

