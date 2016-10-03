<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  Help to scale to fit screen either large medium or small    -->

      <title> Online Shop</title>
    <script src="js/respond.js"></script>
    <link rel ="stylesheet" href="css/bootstrap.min.css">
    <link rel ="stylesheet" href="css/custom.css" media="all">

</head>

<body class  ="body">
<div class ="container-fluid">


<?php

//Getting user IP Address
function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }

    return $ip;
}




if(isset($_GET['addcart']))
{
 
  
  $ip = getIp();

  echo $ip;

//getting the product id of the product we want to add to cart
      
        $prod_id = $_GET['add_cart'];

        
                //inserting into cart to the cart table and setting quantity to default value 1 in the database.
          $query ="INSERT INTO cart (prod_id, ip_add) VALUES ('$prod_id', '$ip')";
          $run_query = mysqli_query($connection, $query) or die(mysqli_error($connection)); 

         var_dump($run_query);

}

?>
</div><!-- .container-fluid-->





<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>