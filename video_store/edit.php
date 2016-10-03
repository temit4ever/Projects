<?php include  "db_connection.php"; 
      include"header.php";
?>


   
<div class="col-sm-9 col-xs-9 col-md-9 ">
<?php

            $custId = $_GET['id']; //Getting Id from the URL...this is gotten when the url also shows the id on the browser

            $query = "SELECT * FROM customers where  cust_id = $custId ";
          
             $result= mysqli_query($connection,$query) ;
             
            
             if(!$result)
             {
               die(mysqli_error($connection));
            }
             $cust_detail = mysqli_fetch_assoc($result);
             

                         $mycustid = $cust_detail['cust_id'];
                         $mycustname = $cust_detail['firstname'];
                         $mycustsur = $cust_detail['surname'];
                         $mycustphone = $cust_detail['phone'];
                         $mycustadd = $cust_detail['address'];
                         $mycustdob = $cust_detail['dob'];
                         $mycustcom = $cust_detail['comment'];
                         $myunpaid = $cust_detail['unpaid'];

?>





<form  method="post" action="edit_cust.php?id=<?php echo $custId; ?>">
  <div class="table-responsive">
     <table class="table table-bordered table-striped table-hover table-condensed">

         <p class = "text-center bg-info " style ='font-size:30px;color:purple'>Edit Customer</p>
     
<!--Form to search for customers detai-->
 
                       

     <tr>
        <td>Customer No:</td> 
        <td><input type="text" class="form-control" name ="mycustid" value= "<?php echo $mycustid; ?>" disabled="disabled" /></td>
     </tr>
     <tr>
        <td>First Name:</td>   
        <td><input type="text" class="form-control"  name="mycustname" value="<?php echo $mycustname; ?>" /></td>
       </tr>
       <tr>
       <td>Sur Name:</td> 
        <td><input type="text" class="form-control" name="mycustsur" value="<?php echo$mycustsur; ?>" /></td></tr>

        <tr>
        <td>Phone:</td>
        <td><input type="text" class="form-control"  name="mycustphone" value= "<?php echo $mycustphone; ?>" /></td></tr>
        <tr>
        <td>Address:</td>
        <td><input type="text" class="form-control"  name="mycustadd" value= "<?php echo $mycustadd; ?>" /></td></tr>
        <tr>
        <td>DOB:</td>
        <td><input type="text" class="form-control"  name="mycustdob" value="<?php echo  $mycustdob; ?>" /></td></tr>
        <tr>
        <td>Comment:</td>
        <td><input type="text" class="form-control"  name="mycustcom" value= "<?php echo $mycustcom; ?>" /></td></tr>

        <tr>
        <td>Unpaid Fees:</td>
        <td><input type="text" class="form-control"  name="myunpaid" value= "<?php echo $myunpaid; ?>" /></td></tr>
    

        <tr>
        <td>&nbsp;</td>
        <td><button type="submit" name = "submit" class="btn btn-primary">Edit Customer</button> </td></tr>
   
 </table> 
 </div> 
 </form> 
</div><!-- div .class="col-sm-8-->
<div class="col-sm-3 col-xs-3 col-md-3 ">

</div>
    
</div><!--div . wrap-->



<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>