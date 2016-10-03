<?php

$dbhost ="localhost";
$dbuser ="root";
$dbpass ="root";
$dbname ="ecomm";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$connection)

{
  die (mysqli_error($connection));

}


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


//adding to cart

function cart()
{

  if(isset($_GET['addcart']))
{
  global  $connection;
  
  $ip = getIp();
//getting the product id of the product we want to add to cart
      
        $prod_id = $_GET['add_cart'];

        //validating add to cart
        $query ="SELECT * FROM product WHERE prod_id = '$prod_id' y '";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
      
       

        if( mysqli_num_rows($result) > 0)//preventing a particular prod_id to be added more than once

          {
            echo "";

          }else
              {
                //inserting into cart to the cart table and setting quantity to default value 1 in the database.
            $query ="INSERT INTO cart (prod_id, ip_add) VALUES ('$prod_id', '$ip')";
                 $run_query = mysqli_query($connection, $query) or die(mysqli_error($connection)); 

          
              
                echo "<script>window.open('index.php', '_self')</script>";





              }



    }

// cloding the connection


} 

// getting categories dynamically

function getcat()
{

	global  $connection;

 $query = "select * from categories";
 $result = mysqli_query($connection,$query) or die(mysqli_error($connection));

 while($row_cat = mysqli_fetch_assoc($result))
 {
   $cat_id = $row_cat['cat_id'];
   $cat_name = $row_cat['cat_name'];

   echo "<li ><a href='index.php?cat=$cat_id' style=\"color:\"> $cat_name</a></li>";

 }


}

// getting brands dynamically

function getbrand()
{

	global  $connection;

 $query = "select * from brands";
 $result = mysqli_query($connection,$query) or die(mysqli_error($connection));

 while($row_brand = mysqli_fetch_assoc($result))
 {
   $brand_id = $row_brand['brand_id'];
   $brand_name = $row_brand['brand_name'];

   echo "<li><a href='index.php?brand=$brand_id'> $brand_name</a></li>";

 }


}

//because the display_prod(),display_cat_prod(),display_brand_prod() are all connected to the home page we use the isset condition below to display result in accordance with the result we want to display. if we didnt use the condition the call function in index.php will display all result from called function at once in homepage

//displaying products to the user interface

 function display_prod(){
 
   if(!isset($_GET['cat']) && !isset($_GET['brand'])) //connecting with home.php
    { 

          global $connection;

          $query = " select * from products order by prod_id";

          $result = mysqli_query($connection, $query) or die(mysqli_error($connection));



          while($row_display = mysqli_fetch_assoc($result))
          {

          	$prod_id = $row_display['prod_id'];
          	$prod_name = $row_display['prod_name'];
          	$prod_price= $row_display['prod_price'];
          	$prod_image = $row_display['prod_image'];


             echo "
             <div style=\"float:left;padding:10px;color:red;border:1px solid skyblue;\" >
             <a href =\"prod_detail.php?id=$prod_id\"><img src ='admin/product_images/$prod_image' style=\"height:180px; width:210px;\">

              <h4>$prod_name</h4> </a>

                price: €$prod_price

                 <a href=\"index.php?add_cart =$prod_id\"><button type='submit' name='addcart' class='btn btn-info' style='float:right'>Add to Cart</button></a>
           </div>


             ";		
              

          }


   

  }

  

}



//displaying products by Category to the user interface

 function display_cat_prod(){

 global $connection;

   if(isset($_GET['cat']))
   {

        $cat_id = $_GET['cat'];

        $query = " select * from products where cat_id = $cat_id ";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

        $row_cnt = mysqli_num_rows($result);
    if($row_cnt ==0)
      {

          
          echo "<h2  style=\"color:purple\">This Category is not available or out of stock. Please check later !!! </h2>";
      }else
        {

        while($row_display = mysqli_fetch_assoc($result))
        {

          $prod_id = $row_display['prod_id'];
          $prod_name = $row_display['prod_name'];
          $prod_price= $row_display['prod_price'];
          $prod_image = $row_display['prod_image'];


           echo "
           <div style=\"float:left;padding:10px;color:red; border:1px solid skyblue;\" >
           <a href =\"prod_cat_detail.php?id=$prod_id\"><img src ='admin/product_images/$prod_image' style=\"height:180px; width:210px;\">

            <h4>$prod_name</h4> </a>

               price: €$prod_price

               <a href=\"index.php?add_cart =$prod_id\"><button type='submit' name='addcart' class='btn btn-info' style='float:right'>Add to Cart</button></a>
         </div>


           ";   
        

      
       }





    }

  }

  
}


//displaying products by brands to the user interface

 function display_brand_prod(){

 global $connection;

   if(isset($_GET['brand']))
   {

        $brand_id = $_GET['brand'];

        $query = " select * from products where brand_id = $brand_id ";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

        $row_cnt = mysqli_num_rows($result);
        if($row_cnt ==0)
        {

          echo "<h2 style=\"color:purple\">This Brand is not available or out of stock. Please check later !!! </h2>";
        }else
         {

        while($row_display = mysqli_fetch_assoc($result))
        {

          $prod_id = $row_display['prod_id'];
          $prod_name = $row_display['prod_name'];
          $prod_price= $row_display['prod_price'];
          $prod_image = $row_display['prod_image'];


           echo "
           <div style=\"float:left;padding:10px;color:red; border:1px solid skyblue;\" >
           <a href =\"prod_detail.php?id=$prod_id\"><img src ='admin/product_images/$prod_image' style=\"height:180px; width:210px;\">

            <h4>$prod_name</h4> </a>

              price: €$prod_price

               <a href=\"index.php?add_cart =$prod_id\"><button type='submit' name='addcart' class='btn btn-info' style='float:right'>Add to Cart</button></a>
         </div>


           ";   
        

      
       }

     }

  }
     

// closing the connection

mysqli_close($connection);

}











?>