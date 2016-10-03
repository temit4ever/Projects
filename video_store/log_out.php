<?php
include "session_start.php";
include  "db_connection.php";



session_unset();
session_destroy(); 




header("Location: home.php");



?>