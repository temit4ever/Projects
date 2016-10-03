<?php include  "db_connection.php"; 
      include"header.php";
?>
  
<div class="col-sm-9 col-xs-9 col-md-6 ">

<?php
 include  "db_connection.php"; 


       $film_id = $_GET['id'];  // collecting data( id ) from URL

//Collecting data from the form in edit.php
        
        
            $title = $_POST['mytitle'];
            $artist_name = $_POST['my_artist'];
            $genre_name = $_POST['mygenre'];
            $rating = $_POST['myrate'];   
            $amount =$_POST['mycharge'];
            $release_yr = $_POST['myrelyr'];

    if(!empty($title) && !empty($artist_name) && !empty($genre_name) && !empty($rating ) && !empty($amount) && !empty($release_yr)) 
       
         { 
            $query = "UPDATE films SET title ='$title', artist_id ='$artist_name',genre_id ='$genre_name', rating ='$rating',charge_id ='$amount',release_yr ='$release_yr', date = NOW() WHERE film_id =  $film_id ";

            $result = mysqli_query($connection, $query);
           if(!$result)  
           {

                die('Connection Failed : '.'<br>'.
                'MYSQL ERROR'.mysqli_error($connection).'<br>'.
                'MYSQL ERRNO' .'('. mysqli_errno($connection).')');


            }else
             {

        $query = "select f.film_id, f.title, a.artist_name, g.genre_name, f.rating, ch.amount, ch.charge_type,f.release_yr
          from films f, artists a, genres g, charges ch
          where f.film_id = $film_id
          and f.artist_id = a.artist_id
          and f.genre_id = g.genre_id
          and f.artist_id = a.artist_id
          and f.charge_id = ch.charge_id
          order by film_id ";
          
             $result= mysqli_query($connection,$query) or die(mysqli_error($connection));
             $rows_num = mysqli_affected_rows($connection);

             $film_detail = mysqli_fetch_assoc($result);
                  
            $film_id = $film_detail['film_id'];
            $title = $film_detail['title'];
            $artist_name = $film_detail['artist_name'];
            $genre_name = $film_detail['genre_name'];
            $rating = $film_detail['rating'];   
            $amount = $film_detail['amount'];
            $charge_type = $film_detail['charge_type'];
            $release_yr = $film_detail['release_yr'];






          echo"<div class='table-responsive'>";
           echo"<table class='table table-bordered table-striped table-hover table-condensed'>" ;

              echo"<p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Customer Updated</p> "; 

              echo"<tr><td>Film No:</td>"; 
              echo"<td>$film_id </td></tr>";

              echo"<tr><td>Title:</td>"; 
              echo"<td>$title </td></tr>";

              echo"<tr><td>Artist Name:</td>"; 
              echo"<td>$artist_name </td></tr>";

              echo"<tr><td>Genre:</td>"; 
              echo"<td>$genre_name </td></tr>";

              echo"<tr><td>Rating:</td>"; 
              echo"<td> $rating </td></tr>";

              echo"<tr><td>Amount:</td>"; 
              echo"<td>$amount </td></tr>";

              echo"<tr><td>Charge Type:</td>"; 
              echo"<td> $charge_type</td></tr>";

              
              echo"<tr><td>Release Year:</td>"; 
              echo"<td>  $release_yr </td></tr>";

        

             echo "</table> ";
           echo" </div> ";
            

          echo "<h3 class='text-success'>Film Updated Successful.</h3><br/>";

                      
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