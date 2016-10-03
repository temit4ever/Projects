 <?php
include  "db_connection.php"; 
include"header.php";


    $custId  = 1 ;
    $output=" ";

  
            $query= " update customers set unpaid = 10.50
                      where cust_id =  $custId ";

             $result=mysqli_query($connection, $query) ;
             
             if (!$result)
             {

                die(mysqli_error($connection));

             }           else{

                    echo " update was successful!!";

             }


            

     

  ?>   
