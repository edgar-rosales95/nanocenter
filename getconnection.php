<?php

date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set("display_errors", 1);


function get_connection() {
    static $connection;
    
    if (!isset($connection)) {
        // Connect to the cmps3420 database using username demo3420, password 3420.
        $connection = mysqli_connect('localhost', 'nanocenter', 'retneconan3420S22','nanocenter') 
            or die(mysqli_connect_error());
    }
    if ($connection === false) {
        echo "Unable to connect to database<br/>";
        echo mysqli_connect_error();
    }
  
    return $connection;
}
?>
