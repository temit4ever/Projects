  <?php include  "db_connection.php"; 
      include"header.php";
?>
   



   <div class="col-sm-9 col-xs-9 col-md-9" >

   <?php  
   include  "db_connection.php"; 

   $user_id = $_GET['id'];// getting id from the url.

        $query = "select * from employee " ;
         $query.=" where employee_id = $user_id ";

         $result= mysqli_query($connection,$query) or die(mysqli_error($connection));

          $row = mysqli_fetch_assoc($result);

          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $position = $row['position'];

    echo"<h2 style = \"color:blue\">Welcome to Admin, you Are :</h2>"."<h2 style='color:purple;'>". $firstname.'  '.$lastname."($position)"."</h2>"; 
    echo"<p style='color:blue;'> Please use the menu on the left </p>";




   ?>
      
    </div>


   </div>

   
  </div>
 </div>



</div>


<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


<body>
</body>
<html>