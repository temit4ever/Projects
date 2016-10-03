<?php include  "db_connection.php"; 
      include "header.php";
?>

<div class="col-sm-5 col-xs-5 col-md-9 ">
 <p class = 'text-center bg-info' style ='font-size:30px;color:purple'> Film Returns Details</p> 
 	<div class="table-responsive">
 	<table class="table table-bordered table-striped table-hover table-condensed">
    
    <tr>
     <th>Rent No</th> <th>Copy No</th><th>Customer Name</th><th>Title / Format</th><th>Staff</th><th>Late Fee/Paid</th><th>Due Date<th>Return Date</th><th>Action</th>
    </tr>	

        <?php

        	$cnt =1;
        	$query = " SELECT fr.return_id,r.rent_id,cust.firstname,cust.surname,f.title,co.copy_id,co.format, emp.lastname,ch.amount,ch.charge_type,r.due,fr.date_return,cust.unpaid
            from film_return fr, rent r, customers cust, films f,copies co, employee emp,charges ch
            where fr.rent_id = r.rent_id
            and  r.cust_id = cust.cust_id
            and f.film_id = co.film_id
            and co.copy_id = r.copy_id
            and fr.employee_id = emp.employee_id
            and fr.charge_id = ch.charge_id " ;

				$result =mysqli_query($connection,$query) or die(mysqli_error($connection));

		while($row = mysqli_fetch_assoc($result))
		{
			$return_id = $row['return_id'];
            $rent_id = $row['rent_id'];
            $firstname = $row['firstname'];
            $surname = $row['surname'];
            $title = $row['title'];
            $emp_lastname = $row['lastname'];   
            $format = $row['format'];
            $amount = $row['amount'];
            $due = $row['due'];
            $date_return = $row['date_return'];
            $copy_id = $row['copy_id'];
            

            $row_cnt = $cnt++;
            $remainder = ($row_cnt % 2);

            if ($remainder == 0)
            {

            	 $style = "style ='background-color:green; color:blue;' ";

          } else{
          			$style = "style ='background-color:yellow; color:black;' ";

            }

            echo " <tr $style> ";
                
            	echo " <td>".$rent_id."</td>";
            	echo " <td>".$copy_id."</td>";
            	echo " <td>".$firstname.'  '. $surname."</td>";
            	echo " <td>".$title. "/". $format."</td>";
            	echo " <td>".$emp_lastname."</td>";
            	
            	echo " <td>".$amount."</td>";
            	echo " <td>".$due."</td>";
            	echo " <td>".$date_return."</td>";
                
            	echo "<td><a href=\"edit_return.php?id='$return_id'\"><button type=\"submit\" name = \"add_copy\" class=\"btn btn-primary\">Edit</button></a></td> ";
    
            echo " </tr>";

        }
        
        ?>
		

 	</table>
    </div>








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

