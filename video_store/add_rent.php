<?php include  "db_connection.php"; 
      include"header.php";
?>
 
  
<div class="col-sm-5 col-xs-5 col-md-5 ">
 
  
  <h3 class =" bg-info" style="color:purple">Please Enter Rent </h3>

  

<div class='table-responsive'>
  <table class='table table-bordered table-striped table-hover table-condensed'>   
    <form role="form" method="post" action="add_rent.php" enctype="multipart/form-data">
      

      
 <tr>
   <td> copy</td>
    <td><select name="mcopy">
      <option> </option>
     

       <?php

          
          $query = " SELECT co.copy_id,co.format, f.title
                 from copies co, films f
                 where f.film_id = co.film_id
                 
                 order by copy_id ";




          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $id = $row['copy_id'];
            $title = $row['title'];
            $format= $row['format'];
            

          

            echo"<option value =\"$id\">$id --- $title($format)</option>";

            
          }
       ?>
</select>
</td>
          
  <tr>
    <td> Customer Name </td>
    <td><select name ="cust_no" size = 1>
      <option> </option>
<?php
      $query = "select * from customers order by cust_id ";

      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));

      while($row = mysqli_fetch_assoc($result))
      {
        $cust_no = $row['cust_id'];
        $fname = $row['firstname'];
        $sname = $row['surname'];

          echo"<option value =\"$cust_no\">$fname   $sname</option>";
      }
         echo $cust_no;
?>
    </select></td>
  </tr>


<tr>
    <td> Staff </td>
    <td><select name ="employee" size = 1>
      <option></option>
<?php
      $query = "select * from employee ";

      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));

      while($row = mysqli_fetch_assoc($result))
      {
        $employee_id= $row['employee_id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];

          echo"<option value =\"$employee_id\">$firstname  $lastname</option>";
      }
        
?>
    </select></td>
  </tr>  

<tr>
       <td> Price </td>
       <td><select name="price">
           <option> </option>
     

       <?php

          
          $query = " SELECT * from charges ";




          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $id = $row['charge_id'];
            $amount = $row['amount'];
            $charge_type = $row['charge_type'];
           

            echo"<option value =\"$id\">€$amount($charge_type)</option>";

            
          }
       ?>
</select>
</td>
</tr>





      <tr>
      <td>&nbsp;</td>
        <td><button type="submit" name = "add_rent" class="btn btn-primary">Add Rent </button> 
      
</form> 
        <a href = "rent_detail.php"><button type="submit" name = "rent_detail" class="btn btn-primary">Rent Details </button></a> </td>
        </tr>
   </table>     
</div>






 <!--Form to search for customers detai-->
 <?php
if(isset($_POST['add_rent']))
{
    $copy = trim($_POST['mcopy']);
    $cust_no = trim($_POST['cust_no']);
    $employee= trim($_POST['employee']);
    $price =trim($_POST['price']);
   



    if(empty( $copy) || empty($cust_no) || empty($employee) || empty($price) )  
    {

      echo"<script>alert('Please Fill all field')</script>";

    }else
          {     

      $date = date("Y-m-d H:i:s"); //current date and time
      $date = strtotime($date);
      $newdate = strtotime("+3 day", $date);
      $due = date('Y-m-d H:i:s', $newdate);

       

        $query= " INSERT INTO rent (copy_id, cust_id, employee_id, charge_id, date_rented,due ) 
        VALUES ('$copy','$cust_no','$employee','$price', NOW(),'$due') ";

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



     </div>
    </div>
   </div><!-- div .container-fluid-->



</div><!--div . wrap-->



<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>


<?php  



//var_dump($result);

      




?>



