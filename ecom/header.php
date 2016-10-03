<?php  include("functions/funct.php") ; ?>



<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  Help to scale to fit screen either large medium or small    -->

      <title> Home Page</title>
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
              <li class="dropdown"><a href="about.php" class="dropdown-toggle" data-toggle="dropdown"> About Us <span class="caret"></span></a>
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
          <button type="submit" name ="submit" class="btn btn-success "  >
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
   
 </div><!--. container-fluid--> 
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