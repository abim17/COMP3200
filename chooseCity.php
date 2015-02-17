<?php require('includes/header.php'); ?>

 <?php 
       $query = $data->query("SELECT * FROM city"); 
       $city_data = array();
       while($city = $query->fetch_assoc()): 
            $city_data[] = $city; 
        endwhile;
    ?> 
    
  <div class="row">
              <div class="col-md-4 form col-md-offset-4">

          
          <h1 >Select your home city</h1>
      
   
       
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
            <input class="btn btn-default" type="submit" value="submit">
          </form>
       </div>
</div>
<?php require('includes/footer.php'); ?>