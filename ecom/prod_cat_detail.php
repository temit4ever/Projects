<?php  include("header.php") ;
	   include("db_conn.php");
	  
      

 ?>
       

  <div class="col-md-7 col-sm-9 col-xs-9 col-md-offset-2 main"  style="margin-top:px"> 
     
    <?php



        $prod_id =$_GET['id'];


        $query = "select * from products where prod_id = $prod_id ";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));



		while($row_display = mysqli_fetch_assoc($result))
		{

			$prod_id = $row_display['prod_id'];
			$cat_id =$row_display['cat_id'];
			$prod_name = $row_display['prod_name'];
			$prod_price= $row_display['prod_price'];
			$prod_image = $row_display['prod_image'];
			$prod_desc = $row_display['prod_desc'];

			echo "

   <div style=\"float:left;padding:10px;color:red; \" >
   <img src ='admin/product_images/$prod_image' style=\"height:380px; width:410px;\"> 

       <h4 style=\"margin-top:20px;padding:0px;text-align:center;\";>$prod_name  €$prod_price</h4> 

        
      <a href=\"index.php\"><button type='button' class='btn btn-primary' style='float:left'>Back</button></a>


       <a href=\"index.php?add_cart =$prod_id\"><button type='submit' name='addcart' class='btn btn-info' style='float:right'>Add to Cart</button></a>

      <h3 style=\"margin-top:60px;color:black;\"> Description </h3>
      <p> $prod_desc </p>

      </div>

   " 
   ;


     }


// closing the connection

mysqli_close($connection);


    ?>




     
  </div> 



<div class="col-md-12 col-sm-12 col-xs-12 " > 

          <h2 class="footer"> &copy; 2016 Online shopping</h2>

 </div>

  </div><!--.row-->  
</div><!--.container-fluid -->




</div><!-- div wrapper-->
<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>