<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'gpnandurbar_gpn');
define('DB_PASSWORD', 'ciQRq{y{^xuT');
define('DB_NAME', 'gpnandurbar_gpn');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>