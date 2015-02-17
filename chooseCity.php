<?php require('assets/templates/header.php'); ?>
 <?php 
       $query = $data->query("SELECT * FROM city"); 
       $city_data = array();
       while($city = $query->fetch_assoc()): 
            $city_data[] = $city; 
        endwhile;
    ?> 
    

  <div id="headerwrap">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
 
          <h1>Select your home city</h1>
      
        </div>
        <div class="col-lg-8 col-lg-offset-2 himg">
          <form name="myform" action="processCity.php" method="POST">

<select name="name">
  <?php 
        //gets all the details of the selected city
        foreach($city_data as $city): 
            $name = $city['name']; 
      ?>
    <option value="<?=$name?>"><?=$name?></option>

    <?php endforeach;
      
   ?>
    </select>
<input type="submit" value="submit">
</form>
        </div>
      </div><!-- /row -->
      </div> <!-- /container -->
  </div><!-- /headerwrap -->
<?php require('assets/templates/footer.php'); ?>