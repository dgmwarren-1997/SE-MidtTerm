<?php


    $servername = "localhost";
    $username = "i7685129_wp1";
    $password = "Reenjay17";
    $dbname = "i7685129_wp1";
    
    // Create connection
    $con =mysqli_connect($servername, $username, $password,$dbname);
    
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 
else {
  
  
}

?>