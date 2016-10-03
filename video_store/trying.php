<?php include  "db_connection.php"; 
      include"header.php";

if(isset($_POST['add_rent']))
{
    $copy =$_POST['mcopy'];
    $cust_no =$_POST['cust_no'];
    $employee= $_POST['employee'];
    $due=$_POST['due'];
   
    



    if( empty( $copy) || empty($cust_no) || empty($employee) || empty($due))  
    {

      echo"<script>alert('Please Fill all field')</script>";

    }else
          {


        $query= " INSERT INTO rent (copy_id, cust_id, employee_id,due ) 
        VALUES ($copy,$cust_no,$employee,'$due') ";

        $result = mysqli_query($connection, $query) ;

        if(!$result)
        {
          die (mysqli_error($connection)); // help to check for error in mysqli syntax


        }else
        {
           echo"<script>alert('Rent was success')</script>";

        }




          }



}






?>

<div class =" col-md-6 ">
<form role="form" method="post" action="trying.php" enctype="multipart/form-data">
 <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover table-condensed'>    

      

      <tr>
       <td> copy</td>
       <td><input type = "text" class="form-control" name="mcopy">
      </tr>

      

      <tr>
       <td> customer</td>
       <td><input type = "text" class="form-control" name="cust_no">
      </tr>



      <tr>
       <td> Employee</td>
       <td><input type = "text" class="form-control" name="employee">
      </tr>



      <tr>
       <td> due</td>
       <td><input type = "text" class="form-control" name="due">
      </tr>




      <tr>
      <td>&nbsp;</td>
        <td><button type="submit" name = "add_rent" class="btn btn-primary">Add Title </button></td>
      </tr>


   </table>     
</div>
</form> 

</div>