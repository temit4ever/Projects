<?php include  "db_connection.php"; 
      include"header.php";
?>

<div class="col-sm-5 col-xs-5 col-md-5 ">
	<p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Enter Film Returns</p> 
 	<div class="table-responsive">
 	<table class="table table-bordered table-striped table-condense">
    <form method="post" action="add_return.php" enctype="multipart/form-data">

       <tr> 
        <td>Rent No: </td>
        <td><select name ="rent_id" size =1>
            <option values =" "> </option>

            <?php

            	$query = " select * from rent ";
            	$result = mysqli_query($connection,$query) or die (mysqli_error($connection)) ;
            	while($row = mysqli_fetch_assoc($result))
            	{
            		$rent_id = $row['rent_id'];
            		

            		echo " <option value =$rent_id>$rent_id  </option>";
            	}

            ?>
            </option>
        </select>
        </td>
       </tr>

       

    

 <tr>
    <td> Staff </td>
    <td><select name ="employee_id" size = 1>
      <option></option>
<?php
      $query = "select * from employee ";

      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));

      while($row = mysqli_fetch_assoc($result))
      {
        $employee_id= $row['employee_id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];

          echo"<option value =\"$employee_id\">$employee_id :$firstname  $lastname</option>";
      }
        
?>
    </select></td>
  </tr>  

<tr>
       <td> Late Fee </td>
       <td><select name="price" size = 1>
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
		 	<td><button type="submit" name= "add_return" class="btn btn-info">Enter Return Film</button>


</form>

		<a href="return_detail.php"><button type="submit" name= "add_return" class="btn btn-info">Returns Details</button>	
         </td>
		 </tr>


 	</table>
    </div>



<?php

		// gathering data from form

		if(isset($_POST['add_return']))
		{
			$rent_id = $_POST['rent_id'];
			
			
			$employee_id = $_POST['employee_id'];
			$price = $_POST['price'];

     if(empty($rent_id)  || empty($employee_id) || empty($price))
      {


      	echo" <script> alert('Please Enter all Field')</script>";


      }else
          {

          	$query = " insert into film_return 
          	(rent_id,   employee_id, charge_id, date_return)
          	values('$rent_id','$employee_id','$price',NOW())";

          	$result = mysqli_query($connection, $query) or die (mysqli_error($connection));

          	echo"<script>alert('Return was success')</script>";




          }







		}

?>




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

