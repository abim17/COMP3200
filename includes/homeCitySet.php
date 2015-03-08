<?php if(!isset($_COOKIE['homeCity'])&&!is_numeric($_COOKIE['homeCity'])){
        $_SESSION['error']='Please select a valid city as your hometown';
        header('Location: chooseCity.php');
    }else{
        $cookie = $data->query('SELECT * FROM city WHERE id = '.$_COOKIE['homeCity']); 
        if($cookie->num_rows==0){
           $_SESSION['error']='Please select a valid city as your hometown';
           header('Location: chooseCity.php');
       }
    }
    ?>