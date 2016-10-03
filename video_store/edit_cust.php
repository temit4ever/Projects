<?php include  "db_connection.php"; 
      include"header.php";
?>
  
<div class="col-sm-9 col-xs-9 col-md-9 ">

<?php
 include  "db_connection.php"; 


        $custId = $_GET['id']; // collecting data( id ) from URL

//Collecting data from the form in edit.php
        
        $custname = $_POST['mycustname'];
        $custsur = $_POST['mycustsur'];
        $custphone= $_POST['mycustphone'];
        $custadd=$_POST['mycustadd'] ;
        $custdob=$_POST['mycustdob'] ;
        $custcom=$_POST['mycustcom'] ;
        $unpaid =$_POST['myunpaid'] ;

    if(!empty($custname) && !empty($custsur) && !empty($custphone) && !empty($custadd) && !empty($custdob) && !empty($custcom) && !empty($unpaid )) 
       
         { 
            $query = "UPDATE customers SET firstname ='$custname', surname ='$custsur',phone ='$custphone',address='$custadd',dob='$custdob',comment ='$custcom', unpaid = ' $unpaid' WHERE cust_id = $custId ";

            $result = mysqli_query($connection, $query);
           if(!$result)  
           {

                die('Connection Failed : '.'<br>'.
                'MYSQL ERROR'.mysqli_error($connection).'<br>'.
                'MYSQL ERRNO' .'('. mysqli_errno($connection).')');


            }else
             {

              $query = "SELECT * FROM customers where cust_id = $custId";
          
             $result= mysqli_query($connection,$query) or die(mysqli_error($connection));
             $rows_num = mysqli_affected_rows($connection);

             $cust_detail = mysqli_fetch_assoc($result);
                  
                         $cust_no = $cust_detail['cust_id'];
                         $firstname = $cust_detail['firstname'];
                         $surname = $cust_detail['surname'];
                         $phone = $cust_detail['phone'];
                         $address = $cust_detail['address'];
                         $dob = $cust_detail['dob'];
                         $comment = $cust_detail['comment'];
                         $unpaid = $cust_detail['unpaid'];







          echo"<div class='table-responsive'>";
           echo"<table class='table table-bordered table-striped table-hover table-condensed'>" ;

              echo"<p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Customer Updated</p> "; 

              echo"<tr><td>Customer No:</td>"; 
              echo"<td>$cust_no </td></tr>";

              echo"<tr><td>Firstname:</td>"; 
              echo"<td>$firstname</td></tr>";

              echo"<tr><td>Surname:</td>"; 
              echo"<td>$surname </td></tr>";

              echo"<tr><td>Phone:</td>"; 
              echo"<td>$phone </td></tr>";

              echo"<tr><td>Address:</td>"; 
              echo"<td>$address </td></tr>";

              echo"<tr><td>DOB:</td>"; 
              echo"<td>$dob </td></tr>";

              echo"<tr><td>Comment:</td>"; 
              echo"<td>$comment </td></tr>";

               echo"<tr><td>Unpaid Fee:</td>"; 
              echo"<td>$unpaid </td></tr>";

       
        

             echo "</table> ";
           echo" </div> ";
            

          echo "<h3 class='text-success'>Customer Updated Successful.</h3><br/>";

                      
                }
            

       }else
          {
       echo "<h3 class='text-danger'>Please go back and fill the empty Field.</h3><br/>";
        
        }




         
      


        






            

           

             
  



?>

  
 <!--Form to search for customers detai-->

</div><!-- div .class="col-sm-8-->
<div class="col-sm-3 col-xs-3 col-md-3 ">

  
                   


  

       
       

     

     
  
 
     </div>
    </div>
   </div><!--.div col-4-->
</div><!--div . wrap-->



<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>