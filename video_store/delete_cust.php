<?php include  "db_connection.php"; 
      include"header.php";
?>
  
<div class="col-sm-9 col-xs-9 col-md-9 ">

<?php
 include  "db_connection.php"; 


       // collecting data( id ) from URL

//Collecting data from the form in edit.php
        
        

             $custId = $_GET['id']; 
         
            $query = "delete from customers WHERE cust_id = $custId ";

            $result = mysqli_query($connection, $query);


           if(!$result)  
           {

                die('Connection Failed : '.'<br>'.
                'MYSQL ERROR'.mysqli_error($connection).'<br>'.
                'MYSQL ERRNO' .'('. mysqli_errno($connection).')');

              

            }else
             {
                

            echo "<h3 class='text-success'>Customer with Id $custId Deleted Successful.</h3><br/>";

                      
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