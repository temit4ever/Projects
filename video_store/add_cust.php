<?php include  "db_connection.php"; 
      include"header.php";
?>
 
  
<div class="col-sm-5 col-xs-5 col-md-5 ">
 
  
  <h3 class =" bg-info" style="color:purple">Please Enter Customers Detail </h3>

  
 <!--Form to search for customers detai-->
<?php
if(isset($_POST['add_cust']))
{
    $fname = trim($_POST['fname']);
    $sname = trim($_POST['sname']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $dob = trim($_POST['dob']);
    $comment = trim($_POST['comment']);
    



    if( empty($fname) || empty($sname) || empty($phone) || empty($address) || empty($dob) )  
    {

      echo"<script>alert('Please Fill all field')</script>";

    }else
          {


        $query= " INSERT INTO customers( firstname, surname, phone, address, dob, comment ) VALUES ('$fname','$sname','$phone',' $address','$dob','$comment')";

        $result = mysqli_query($connection, $query);


        if(!$result)
        {
          die (mysqli_error($connection)); // help to check for error in mysqli syntax


        }else
        {
           echo"<script>alert('Customer $fname   $sname is added!!')</script>";



           

        }

           


          }



}
 

?>
            

<form role="form" method="post" action="add_cust.php" enctype="multipart/form-data">
 <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover table-condensed'>    

      

      <tr>
       <td>Firstname  </td>
       <td><input type = "text" class="form-control" name="fname"></td>
      </tr>


      <tr>
       <td>Surname  </td>
       <td><input type = "text" class="form-control" name="sname"></td>
      </tr>
      
      
      <tr>
       <td>Phone  </td>
       <td><input type = "text" class="form-control" name="phone"></td>
      </tr>
      
      <tr>
       <td>Address </td>
       <td><input type = "text" class="form-control" name="address"></td>
      </tr>

      <tr>
       <td>Date of Birth         </td>
       <td><input type = "text" class="form-control" name="dob" placeholder=" YYYY-MM-DD"></td>
      </tr>


      <tr>
       <td>Comment  </td>
       <td><textarea type = "text" class="form-control" name="comment"></textarea></td>
      </tr>

      <tr>
      <td>&nbsp;</td>
        <td><button type="submit" name = "add_cust" class="btn btn-primary">Add Customer </button></td>
      </tr>

    
   </table>     
</div>
</form> 

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


<?php  









?>



