<?php  include("includes/db_conn.php");  ?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  Help to scale to fit screen either large medium or small    -->

      <title> Online Shop</title>
    <script src="js/respond.js"></script>
    <link rel ="stylesheet" href="css/bootstrap.min.css">
    <link rel ="stylesheet" href="css/customadmin.css" media="all">


   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

</head>

<body class  ="body">


<div class ="container-fluid" >
    <div class="row">
       <div class="col-md-7 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-8 col-xs-offset-3 bg-success">
<p class = 'text-center ' style ='font-size:30px;color:purple'>Insert Products</p>  

  <form = method="post" action ="form_insert.php" enctype="multipart/form-data">      
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed" >

		   <tr >
		     <td >Product Name </td>
		     <td><input type="text" class="form-control" name="prod_name"></td>
		   </tr>

		   <tr>
		     <td>Product Category </td>
		     <td>
		     	<select name="prod_cat" size=1>
		     	 <option> Select Product Category</option>
		     	 <?php 
		     	 	$query = "select * from categories";
 $result = mysqli_query($connection,$query) or die(mysqli_error($connection));

				 while($row_cat = mysqli_fetch_assoc($result))
				 {
				   $cat_id = $row_cat['cat_id'];
				   $cat_name = $row_cat['cat_name'];

				   echo "<option value = $cat_id> $cat_name</option>";
						     	 		 
		   	 	}

		     	 ?>

		     	</select>	
		     </td>
		   </tr>

		   <tr>
		     <td>Product Brand </td>
		     <td>
		     	<select name="prod_brand">
		     	  <option> Product Brand </option>
		     	  <?php

		     	  	$query ="select * from brands ";
		     	  	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));
		     	  	while($row_brand = mysqli_fetch_assoc($result))
		     	  	{
		     	  		$brand_id = $row_brand['brand_id'];
		     	  		$brand_name = $row_brand['brand_name'];

		     	  		echo"<option value = $brand_id> $brand_name </option>";


		     	  	}

		     	  ?>	



		     	</select>


		     </td>
		   </tr>

		   <tr>
		     <td>Product Image </td>
		     <td><input type="file" name="prod_image"></td>
		   </tr>

		   <tr>
		     <td>Product Price</td>
		     <td><input type="text" class="form-control" name="prod_price"></td>
		   </tr>

		   <tr>
		     <td>Product Describtion </td>
		     <td><textarea  name="prod_desc" cols=10 rows = 5 class="form-control" ></textarea></td>
		   </tr>

		   <tr>
		     <td>Product Keywords </td>
		     <td><input type="text" class="form-control" name="prod_keywords"></td>
		   </tr>



          <tr>
           <td>&nbsp;</td>
           <td><button type="submit" name = "submit" class="btn btn-success"> Insert Product</button></td>
          </tr>

      </table>


   </div>
   </form>
  </div><!--col-md-5 col-sm-5 col-xs-5-->
 </div><!--.row-->
</div><!-- .container-fluid-->


<?php  



if(isset($_POST['submit']))
{
	     //Getting data from form

		  $prod_name =$_POST['prod_name'];
		  $prod_cat =$_POST['prod_cat'];
		  $prod_brand =$_POST['prod_brand'];
		  $prod_price =$_POST['prod_price'];
		  $prod_desc =$_POST['prod_desc'];
		  $prod_keywords =$_POST['prod_keywords'];


	//getting the image from the field by using $_FILE becose image or file is targeted by $_FILE and we specify what exactly we want to target from the file maybe name of image or size or format....and follow by the temporary name of the file or image in the system or server(that is the temporary filename of the file in the server

		  $prod_image = $_FILES['prod_image']['name'];
		  $prod_image_tmp = $_FILES['prod_image']['tmp_name'];

	// Uploading file to desire destination

	move_uploaded_file($prod_image_tmp, "product_images/$prod_image");

   if(empty($prod_name) || empty($prod_cat) || empty($prod_brand) || empty($prod_image) || empty($prod_price) || empty($prod_desc) || empty($prod_keywords))	  
    {

    	echo"<script> alert('Field can not be empty')</script>";
    	
    }else
         {

           $query=" insert into products 
           (cat_id, brand_id,prod_name, prod_price, prod_desc, prod_image, prod_keywords)
           values ('$prod_cat','$prod_brand','$prod_name','$prod_price','$prod_desc', '$prod_image', '$prod_keywords')";

           	$result = mysqli_query($connection,$query) ;

           	if(!$result)
           	{
           		echo"<script> alert('Product Insertion not successful')</script>";

           	}else
           	{
           		echo"<script> alert('Product Inserted')</script>";
           		echo"<script>window.open('form_insert.php' ,'_self')</script>";
           	}


         }

// closing the connection

mysqli_close($connection);



}






?>


<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>