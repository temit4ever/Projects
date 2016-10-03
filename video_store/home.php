<?php 
      require_once("form_funct.php");
      

      include  "db_connection.php";


 ?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  Help to scale to fit screen either large medium or small    -->

      <title> Menu</title>
    <script src="js/respond.js"></script>
    <link rel ="stylesheet" href="css/bootstrap.min.css">
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
            tinymce.init({selector:'textarea'});
     </script>
    <link rel ="stylesheet" href="css/custom_style.css">
    <link rel ="stylesheet" href="css/project_style.css">

</head>


<body class="bdy">

<div class="wrap">

  <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container-fluid">
       <a href="#" class=" navbar-brand"><img src="/video_store/image/vid_reel.jpg"> 
         <h2> Oblack Video  Rental </h2></a> 
     
        <a href="#"> <div class="flo"><img src="/video_store/image/vid_reel.jpg"> 
        </div>
        </a>  
    </div>
  </nav> 


  <div class="container-fluid">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" style="background:;height:400px;">
             <br><br><br>
        
              <div class = "page-header " >
                <span class="glyphicon glyphicon-film gi-4x"></span>
               <b>Welcome to Oblak Video Store</b>
              </div>

   <div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-3 bg-info" >

      <form role="form" method ="post" name ="sendmessage" id="userform" >

     <?php send_message();  ?> <!-- send from form_function-->

      <div class="form-group row"><br>
      <label for="user" class="col-sm-4 col-xs-6 col-md-4 form-control-label">User Name</label>
      <div class="col-sm-6 col-xs-6 col-md-6">
      <input type="text" class="form-control" id="user" name ="user" placeholder="Enter 
      Username">
      </div>
      </div>

      <div class="form-group row">
      <label for="passw" class="col-sm-4 col-xs-6 col-md-4 form-control-label">Password</label>
      <div class="col-sm-6 col-xs-6 col-md-6">
      <input type="password" class="form-control" id="passw" name ="passw" placeholder="Enter 
      password">
      </div>
      </div><br>

      <button type = "submit" name = "submit" class ="btn btn-info col-sm-2 col-xs-5 submit " style="margin-bottom:10px;"> Enter</button>

      </form>
     </div><!--div .col-xs-6 col-sm-6-->
   </div>
     

   </div>    
  </div>
 </div>
</div>
 
<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>
</html>