<?php include  "db_connection.php"; 
      include"header.php";
?>

  
<div class="col-sm-5 col-xs-5 col-md-5 ">
 
  
  <P style="color:purple;font-size:23px;">Please enter any field</p>

  
 <!--Form to search for customers detai-->

<form role="form" method="post" action="cust_search.php" enctype="multipart/form-data">
 <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover table-condensed'>    

      

      <tr>
       <td>Customer's Id  </td>
       <td><input type = "text" class="form-control" name="custId"></td>
      </tr>


      <tr>
       <td>First Name  </td>
       <td><input type = "text" class="form-control" name="custName"></td>
      </tr>
      
      
      <tr>
       <td>Surname </td>
       <td><input type = "text" class="form-control" name="custSur"></td>
      </tr>
      
    
      <tr>
      <td>&nbsp;</td>
        <td><button type="submit" name = "submit" class="btn btn-primary">Search Customer </button></td>
      </tr>

    
   </table>     
</div>
</form> 
<!--
<form role="form" method="post" action="cust_search.php" >

      <div class="form-group">
        <label for="custId">Customer's Id :</label>
        <input type="text" class="form-control" id="custId" name="custId"  >
      </div>

      <div class="form-group">
        <label for="custName"> Customer's First Name : </label>
        <input type ="text" class="form-control" id="custName" name="custName">
      </div>

      <div class="form-group">
        <label for="custSur"> Customer's Surname : </label>
        <input type ="text" class="form-control" id="custSur" name="custSur">
      </div>

        <button type="submit" name = "submit" class="btn btn-primary"> Find Customer </button>

    </form>
    -->  
</div>
 
     </div>
    </div>
   </div><!-- div .container-fluid-->



</div><!--div . wrap-->



<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>