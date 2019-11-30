<?php
 
 // DB configuration
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "phrases";
  $link = mysqli_connect($db_host, $db_user, $db_password, $db_name); 
    
if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit; }
 
?>

