<?php
    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'vc0E8mFT4P';
    $dbSchema = 'comp3200';
    $data = new mysqli($dbhost, $dbUsername, $dbPassword, $dbSchema);
    if($data->connect_error) {	
        die("Could not connect to MySQL");	
    }
    ?>