<?php include  "db_connection.php"; 
      include"header.php";
?>


   
<div class="col-sm-9 col-xs-9 col-md-6 ">
<?php

            $filmId = $_GET['id']; //Getting Id from the URL...this is gotten when the url also shows the id on the browser

            
$query = "select f.film_id, f.title, a.artist_name, g.genre_name, f.rating,         ch.amount, ch.charge_type,f.release_yr
          from films f, artists a, genres g, charges ch
          where f.film_id = $filmId
         and f.artist_id = a.artist_id
          and f.genre_id = g.genre_id
          and f.artist_id = a.artist_id
          and f.charge_id = ch.charge_id
          order by film_id";
;
          
             $result= mysqli_query($connection,$query) ;
             
            
             if(!$result)
             {
               die(mysqli_error($connection));
            }
             $row = mysqli_fetch_assoc($result);
             
            $film_id = $row['film_id'];
            $title = $row['title'];
            $artist_name = $row['artist_name'];
            $genre_name = $row['genre_name'];
            $rating = $row['rating'];   
            $amount = $row['amount'];
            $charge_type = $row['charge_type'];
            $release_yr = $row['release_yr'];

?>






  <div class="table-responsive">
     <table class="table table-bordered table-striped table-hover table-condensed">

     <form  method="post" action="update_film.php?id=<?php echo $film_id; ?>">

         <p class = "text-center bg-info " style ='font-size:30px;color:purple'>Edit Film </p>
     
<!--Form to search for customers detai-->
 
                       

     <tr>
        <td>Film No:</td> 
        <td><input type="text" class="form-control" name ="myfilmid" value= "<?php echo $film_id; ?>" disabled="disabled" /></td>
     </tr>
     <tr>
        <td>Title:</td>   
        <td><input type="text" class="form-control"  name="mytitle" value="<?php echo $title; ?>" /></td>
       </tr>
       
     <tr>
       <td>Artist </td>
      <td><select name="my_artist" size=1>
          <option></option>
       <?php

          
          $query = "SELECT * FROM artists order by artist_id" ;
          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $artistId = $row['artist_id'];
            $artistName = $row['artist_name'];

            echo"<option value =\"$artistId\">$artistName </option>";

            
          }
       ?>
  </select>
  </td></tr>


       <tr>
       <td>Genre </td>
      <td><select name="mygenre" size=1>
          <option></option>
       <?php

          
          $query = "SELECT * FROM genres" ;
          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $id = $row['genre_id'];
            $name = $row['genre_name'];

            echo"<option value =\"$id\">$name</option>";

            
          }
       ?>

          </select></td>
      </tr>


         <tr>
       <td>Rating</td>
       <td><select name="myrate" size=1>
           <option></option>
          <option value =" 1 ">G</option>
          <option value =" 2 ">PG</option>
          <option value =" 3 ">M</option>
          <option value =" 4 ">R</option>
       </select></td>
      </tr>


        <tr>
       <td>Price</td>
       <td><select name="mycharge" size=1>
          <option></option>

       <?php

          
          $query = "SELECT * FROM charges" ;
          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $charge_id = $row['charge_id'];
            $charge_type = $row['charge_type'];

            echo"<option value =\"$charge_id\">$charge_type </option>";

            echo $id;
          }
       ?></td>
      </tr>
        
        <tr>
        <td>Year Release:</td>
        <td><input type="text" class="form-control"  name="myrelyr" value= "<?php echo $release_yr; ?>" /></td></tr>

    

        <tr>
        <td>&nbsp;</td>
        <td><button type="submit" name = "submit" class="btn btn-primary">Edit Film</button> 
 
 </form>
      <a href="film_details.php"><button type="submit" name = "submit" class="btn btn-primary">Back</button> </a> </td></tr> 

  
 </table> 
 </div> 

</div><!-- div .class="col-sm-8-->
<div class="col-sm-3 col-xs-3 col-md-3 ">

</div>
    
</div><!--div . wrap-->



<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>