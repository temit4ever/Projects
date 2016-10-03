<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  Help to scale to fit screen either large medium or small    -->

      <title> Basic File</title>
    <script src="js/respond.js"></script>
    <link rel ="stylesheet" href="css/bootstrap.min.css">
    <link rel ="stylesheet" href="css/logo_centered.css">
    <link href="css/offcanvas1.css" rel="stylesheet">
    
</head>
 <body>

 
   <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container-fluid">
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>

      <div class="div">
      <a href="#" class=" navbar-brand"><img src="/bootstrap/image/zala.jpg" ></a>
      </div>
   </div>

   <div class="collapse navbar-collapse wrap" id ="navbar">
       <ul class="nav navbar-nav" >
          <li class="active "><a href="#">Home</a></li>
          <li><a href="#">History</a></li>
          <li><a href="#">Portfolio</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">About
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li class="dropdown-header">Company Story</li>
         <li><a href="#" >Brief Histroy </a></li>
         <li><a href="#" >Date Founded </a></li>
        </ul>
       </li>
        <li><a href="#" >Contact </a></li>
        </ul>
  </div>  

 </div>
</nav>


<div class="container-fluid">
   <div class="row row-offcanvas row-offcanvas-left">
       <div class="col-xs-2 col-sm-2  sidebar-offcanvas" id="sidebar">

			<ul class="nav nav-sidebar">
			    
			    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Project
			    <span class="caret"></span></a>
			     <ul class="dropdown-menu">
			      <li><a href="#" >PHP Software design </a></li>
			      <li><a href="#" >MYSQL Database collection </a></li>
			     </ul>
			    </li>

			    <li><a href="#">Sign Up</a></li>
			</ul>  
			 
	         <ul class="nav nav-sidebar">
	            <li><a href="">Nav item</a></li>
	            <li><a href="">Nav item again</a></li>
	            <li><a href="">One more nav</a></li>
	            <li><a href="">Another nav item</a></li>
	            <li><a href="">More navigation</a></li>
	          </ul>

	          <ul class="nav nav-sidebar">
	            <li><a href="">Nav item again</a></li>
	            <li><a href="">One more nav</a></li>
	            <li><a href="">Another nav item</a></li>
	          </ul>
      </div><!--/.sidebar-offcanvas-->
      
      <div id="main" >
      <div class="col-xs-12 col-sm-10">
         <p class="visible-xs">
           <button type="button" class="btn btn-danger btn-lg" data-toggle="offcanvas">
           <span class="glyphicon glyphicon-th-large"></span>
           </button>
         </p>
         <h2>Fixed + Fluid Bootstrap Template with Off-canvas Sidebar</h2>
     

        <div class="row"><!--This row makes below cntent be inline with the .jumbotron-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->

        </div> <!--div.row-->  
      </div><!--div.col-xs-12 col-sm-10 -->
     </div><!--id main-->


   </div><!--/<!--/.row-offcanvas-left-->
</div><!--div .container-fluid-->











<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/offcanvas.js"></script>

</body>
</html>