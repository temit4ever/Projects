<?php include  "db_connection.php"; 
      include"header.php";
?>
  
<div class="col-sm-9 col-xs-9 col-md-9 ">
 <p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Rental Details</p> 
 <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-condensed">
  <tr>
    <th>Rent No</th><th>Copy No</th><th>Customer No</th><th>Customer Name</th><th>Staff</th><th>Title</th><th>Format</th><th>Price</th><th>Date out<th>Due Date</th>
  </tr>

<?php

$cnt = 1;
 $display = "";
 $query = "SELECT r.rent_id, co.copy_id, cust.cust_id,cust.firstname, cust.surname, emp.lastname,f.title, co.format,  ch.amount, r.date_rented,r.due
		from rent r, films f, copies co,customers cust, employee emp,charges ch
		where r.copy_id = co.copy_id
		and f.film_id = co.film_id
		and r.cust_id = cust.cust_id
		and r.employee_id = emp.employee_id
		and r.charge_id = ch.charge_id ";


		$result =mysqli_query($connection,$query) or die(mysqli_error($connection));

		while($row = mysqli_fetch_assoc($result))
		{


            $rent_id = $row['rent_id'];
            $copy_id = $row['copy_id'];
            $cust_id = $row['cust_id'];
            $firstname = $row['firstname'];
            $surname = $row['surname'];
            $emp_lastname = $row['lastname'];   
            $title = $row['title'];
            $format = $row['format'];
            $amount = $row['amount'];
            $date_rented = $row['date_rented'];
            $due = $row['due'];

          $row_cnt = $cnt++;
          $remainder = ($row_cnt % 2);
          if ($remainder == 0)
          {
          $style = "style ='background-color:green; color:blue;' ";

          } else{
          			$style = "style ='background-color:yellow; color:black;' ";


          } 	


          echo" <tr $style>";

          echo"<td>".$rent_id."</td>";
          echo"<td>".$copy_id."</td>";		
          echo"<td>".$cust_id."</td>";	
          echo"<td>".$firstname.'    '.$surname ."</td>";	
          echo"<td>".$emp_lastname."</td>";	
          echo"<td>".$title."</td>";	
          echo"<td>".$format."</td>";	
          echo"<td>".$amount."</td>";	
           echo"<td>".$date_rented."</td>";	
           echo"<td>".$due."</td>";

          echo "</tr>";

		}

?>
      
        
</table>
			
</div>

 <a href="add_rent.php"><button type="submit" name = "add_copy" class="btn btn-primary">Back</button></a> 
     













</div><!-- div .class="col-sm-9-->   
  
 
     </div>
    </div>
   </div><!--.div col-4-->
</div><!--div . wrap-->
