<?php include("form_funct.php");
      include("header.php");
      
?>


<div class="col-sm-5 col-xs-5 col-md-6 col-md-offset-2 ">


<p style="color:purple; font-size: 20px; ">Search For Moives Title</p>

 <form role="form" method="post" action="search_title.php" enctype="multipart/form-data">
 <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover table-condensed'>    

      

      <tr>
       
       <td><input type = "text" class="form-control" name="mtitle">
      </tr>

      <tr>
      
        <td><button type="submit" name = "search" class="btn btn-primary">Add Title </button></td>
      </tr>


   </table>     
</div>
</form> 





<?php
    
    search_title();
  
   



?>
     


<!--
	
 <form role="form" method="post" class="form-horizontal" action ="search_title.php">

   <div class="form-group">

    <button type="submit" name = "search_movie" class=" col-md-2 col-md-offset-1 col-xs-2 btn btn-primary">Search Movie </button> 
    <div class="col-md-3 col-xs-3">
      <input type="email" class="form-control" name ="search" placeholder="Email">
    </div>

  </div>
 </form>
-->



     </div>
   </div>
 </div><!-- div .container-fluid-->

</div><!--div . wrap-->




<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



</body>
</html>