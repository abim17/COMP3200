<?php 
session_start();
require('includes/header.php'); 
?>

 <?php 
       $query = $data->query("SELECT * FROM city"); 
       $city_data = array();
       while($city = $query->fetch_assoc()): 
            $city_data[] = $city; 
        endwhile;
    ?> 
       
  <div class="jumbotron"> 
    <?php 
                    if(isset($_SESSION['error'])){
                      echo('<div class="text-center alert alert-danger">'.$_SESSION['error'].'</div>');
                      
                      unset($_SESSION['error']);
                    }


                    ?>
          <h2 class="text-center">Making travel easy</h2>
      
    <div class="row">
      <div class="col-md-6 col-md-offset-1">
        <h3>3 easy steps</h3>
        <p>Want quick and useful advice when deciding where to go in the UK? Complete these quick 3 steps below to get all the information you need to make an informed decision.</p>
      </div>
      <div class="col-md-11 col-md-offset-1 text-center">
          <div class="col-md-4 description">
               <p>STEP 1</p>Begin by selecting you home city from the dropdown on the right. Nice and easy!
          </div>
          <div class="col-md-3">
           <!-- http://icons.iconarchive.com/icons/gakuseisean/ivista-2/256/Alarm-Arrow-Right-icon.png -->
           <img class="easysteps" src="images/arrow.png">
          </div>
        
         <div class="col-md-3">
          <div class="col-md-12">
            <h3>Select your city</h3>
          </div>
            <form name="myform" action="processCity.php" method="POST">

              <div class="col-md-9">
              
                <select name="name" class="form-control">
                  <?php 
                        //gets all the details of the selected city
                        foreach($city_data as $city): 
                            $name = $city['name']; 
                            $id = $city['id']; 
                      ?>
                    <option value="<?=$id?>"><?=$name?></option>

                    <?php endforeach;
                      
                   ?>
                </select>
            </div>
              <input class="btn btn-default col-md-3" type="submit" value="submit">
            </form>
          </div>
      </div>
       <div class="col-md-11 col-md-offset-1 text-center">
      
             <div class="col-md-4 description">
                   <p>STEP 2</p>Choose where you want to visit by clicking on the different pins adn selecting 'Find out more'
            </div>
            <div class="col-md-6">
             
             <img class="easysteps" src="images/step2.PNG">
            </div>
          
         
          <div class="row">
            <div class="col-md-4 description">
                 <p>STEP 3</p>You can then select the time and day you want to leave to get train times and weather details to the place you want to go
            </div>
            <div class="col-md-6">
             <img  class="easysteps" src="images/step3.PNG">
            </div>
            <a href="#" class="scrollToTop">Scroll To Top</a>
       </div>
        

      </div>
    </div>


     
        </div>
  </div>

 <div class="container textcontent">
<?php require('includes/footer.php'); ?>