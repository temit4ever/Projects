<?php session_start(); 
include  "db_connection.php"; 
include"header.php";
?>
 
<div class="col-sm-7 col-sm-offset-1 col-xs-7 col-xs-offset-1 col-md-8 col-md-offset-1">
 
  
 <!--Form to search for customers detai-->
  <h2 style = "color:black">Customer's Current Rental Detail</h2>
  
  <p style= " font-size:30px;color:purple"> Rented Videos / Return & Unpaid</p>


<?php 
           $custId  = $_GET['id'];
            $output="";

        $query = "SELECT ch.amount,sum(amount) as amount
                  from customers cust,film_return fr,rent r,charges ch
                  where cust.cust_id = $custId
                  and cust.cust_id = r.cust_id
                  and fr.rent_id = r.rent_id
                  and fr.charge_id = ch.charge_id ";

        $result= mysqli_query($connection,$query) or die(mysqli_error($connection));

        $cust_detail = mysqli_fetch_assoc($result);
     
        $total_amount = $cust_detail['amount'];
        
       
   ?>

     


<?php  


    $custId  = $_GET['id'];

    $query = " select * from customers where cust_id = $custId ";
     $result= mysqli_query($connection,$query) or die(mysqli_error($connection));
     $cust_detail =mysqli_fetch_assoc($result);

     $cust_no = $cust_detail['cust_id'];
     $firstname = $cust_detail['firstname'];
     $surname = $cust_detail['surname'];
     $dob = $cust_detail['dob'];

     $output.="CUSTOMER NO: ".$cust_no."<br>";
     $output.=" NAME: ".$firstname. '  ' .$surname."<br>";
     $output.="DATE OF BIRTH: ".$dob."<br>"."<br>";
    

   ?>


   <?php

    $query = " SELECT fr.return_id,r.rent_id,cust.firstname,cust.surname,co.copy_id,f.title,co.format,ch.amount,ch.charge_type,fr.date_return, cust.unpaid,r.due ,r.date_rented
      from film_return fr, rent r, customers cust, films f,copies co,charges ch
            where cust.cust_id = $custId
            and fr.rent_id = r.rent_id
            and  r.cust_id = cust.cust_id
            and f.film_id = co.film_id
            and r.charge_id = ch.charge_id
            and co.copy_id = r.copy_id
            

            order by return_id

  
    ";
            
        
    $result= mysqli_query($connection,$query) or die(mysqli_error($connection));


 $cnt =1;
   
   while($cust_detail = mysqli_fetch_assoc($result))
        
       {                
                          
                         $copy_no = $cust_detail['copy_id'];
                         $title = $cust_detail['title'];
                         $format = $cust_detail['format'];
                         $amount_rented = $cust_detail['amount'];
                         $ctype_rented = $cust_detail['charge_type'];
                         $unpaid = $cust_detail['unpaid'];
                         $date_rented = $cust_detail['date_rented'];
                         $due = $cust_detail['due'];
                         $date_return = $cust_detail['date_return'];
                         
                         
                $row_cnt = $cnt++;


    $output.="Item $row_cnt : "."Copy No ($copy_no) - " .$title. "($format)."." Rented Date ".  $date_rented. ".". " Due : " .$due.".". " Rent fee "."(€$amount_rented). " ;

    $output.=" Return Date: ".$date_return. ". "."<br>"."<br>";                       
          


        }       
            
      $output .= " Total Late Fee(€$total_amount)"; 
    
        echo $output;                   
      

  
?>


 <?php
            

             
            $query= " update customers set unpaid = $total_amount
                      where cust_id =  $custId ";

             $result=mysqli_query($connection, $query) ;
             
             if (!$result)
             {

                die(mysqli_error($connection));

             }           else{

                    
                    exit;

             }


            
     ?>


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