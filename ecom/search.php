<?php  include("functions/funct.php") ; 
       include("db_conn.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  Help to scale to fit screen either large medium or small    -->
      <title> Basic File</title>
    <script src="js/respond.js"></script>
    <link rel ="stylesheet" href="css/bootstrap.min.css">
    <link rel ="stylesheet" href="css/newcustom.css" media="all">   
</head>
 <body style="">
 <div class="wrapper">
   <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container-fluid">
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>

      <div class="div">
      <a href= "index.php" class="navbar-brand" style="margin-top:px;"><img id="logo" src="/ecom/logo/logo.jpg" ><img  id ="banner" src="/ecom/logo/banner_2.jpg">
          </a>
      </div>
   </div>
   <div class="collapse navbar-collapse " id ="navbar" >
      <ul class="nav navbar-nav nav1  ">
         <li class=" " ><a href="index.php" > <span class="glyphicon glyphicon-home" style="margin-top:-10px"></span> Home </a>
          </li>
           <li><a href="all_prod.php" >Products</a></li>
            <li class="dropdown"><a href="about.php" class="dropdown-toggle" data-toggle="dropdown">About Us <span class="caret"></span></a>
            <ul class=dropdown-menu>
            <li><a href="contact.php">Contact</a></li>
           </ul> 
          </li>
        </ul>
        <div class="navbar-header navbar-right">  
          <ul class="nav navbar-nav nav2" style=";">
           <li ><form  method="get" action="search.php"> <div class="input-group search" >
              <input type="text" class="form-control" placeholder="Search for Product..." name="search">
                <span class="input-group-btn ">
                   <button type="submit" name ="submit" class="btn btn-success" value="Search"  >
                   <span class="glyphicon glyphicon-search" ></span>
                     Search
                  </button></span></div></a>
       </li></form>
                <li style=" "><a href="cart.php">Shopping cart</a></li>
                 <li style=" "><a href="customer/account.php">My Account</a></li>
                <li><a href="#">Sign up </a></li>
        </ul>
       </div> <!--.navbar-header--> 
   </div>  <!--. navbar-collapse--> 
 </div>
</nav>
<div class="container-fluid">
   <div class="row row-offcanvas row-offcanvas-left">
       <div class="col-md-3 col-sm-3 col-xs-3 sidebar-offcanvas" id="sidebar" style=""> 
        <div class="topbar" style="">Categories</div>
          <ul class="nav nav-sidebar sidebar">
        <?php  getcat(); ?>  
      <div class="topbar" style="margin-top:20px">Brands</div>
        <?php getbrand() ; ?>
    </ul>         
      </div><!--/.sidebar-offcanvas-->
     <div  class="shopping_cart" style="">
    <span class="mini">
   Welcome Guest ! <b style="color:purple"> Shopping Cart -  </b> Total Items: - Total Price: <a href="go_cart.php" style="color:red;"">Go to Cart</a> <a href="login.php">Log-in</a>
   </span>
</div>
    <div class="col-xs-9 col-sm-9 col-md-9 main">
         <p class="visible-xs">
           <button type="button" class="btn btn-danger btn-lg" data-toggle="offcanvas">
           <span class="glyphicon glyphicon-th-large"></span>
           </button>
         </p>
        <div class="row">
  <?php   
    if(isset($_GET['submit']))
      { 
        $get_input = $_GET['search'];
        $query = " select * from products where prod_keywords like '%$get_input%' ";
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
                $prod_price
                <a href=\"index.php?add_cart=$prod_id\"><button type='button' class='btn btn-info' style='float:right'>Add to Cart</button></a>
           </div>";   
          }  
     } 
     else{
             echo "<h3> No result was Found </h3>";
     }
         
// closing the connection
mysqli_close($connection);
?>
  </div> <!--div.row--> 
</div>
	   
<div class="col-md-12 col-sm-12 col-xs-12 " > 
  <h2 class="footer"> &copy; 2016 Online shopping</h2>
 </div>
 </div><!--/<!--/.row-offcanvas-left-->
</div><!--div .container-fluid-->
</div><!--wrapper-->
<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/offcanvas.js"></script>

</body>
</html>
