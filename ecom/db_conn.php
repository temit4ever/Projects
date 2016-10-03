<?php

// Making connections

$dbhost ="localhost";
$dbuser ="root";
$dbpass ="root";
$dbname ="ecomm";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$connection)

{
  die (mysqli_error($connection));

}



?>