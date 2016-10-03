<?php include  "db_connection.php"; 
      include"header.php";
?>
 
  
<div class="col-sm-5 col-xs-5 col-md-5 ">
 
  
  <h3 class =" bg-info" style="color:purple">Please Enter Movies </h3>

  
 <!--Form to search for customers detai-->
<?php
if(isset($_POST['add_title']))
{   
    $mtitle =$_POST['mtitle'];
    $mgenre =$_POST['mgenre'];
    $martist = $_POST['m_artist'];
    $mrate =$_POST['mrate'];
    $mcharges =$_POST['mcharges'];
    $mrel_date = trim($_POST['mrel_date']);

    



    if( empty($mtitle) || empty($mrel_date) || empty($mgenre) || empty($mrate) || empty($mcharges) || empty($martist))  
    {

      echo"<script>alert('Please Fill all field')</script>";

    }else
          {


        $query= " INSERT INTO films( title, genre_id, artist_id,rating, charge_id, release_yr, date ) VALUES ('$mtitle','$mgenre',' $martist','$mrate',' $mcharges','$mrel_date',NOW())";

        $result = mysqli_query($connection, $query);

        if(!$result)
        {
          die (mysqli_error($connection)); // help to check for error in mysqli syntax


        }else
        {
           echo"<script>alert('$mtitle is added!!')</script>";

        }




          }



}


?>
 <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover table-condensed'> 

<form role="form" method="post" action="add_film.php" enctype="multipart/form-data">


      <tr>
       <td>Movie Title </td>
       <td><input type = "text" class="form-control" name="mtitle">
      </tr>


      <tr>
       <td>Genre </td>
      <td><select name="mgenre" size=1>
          <option></option>
       <?php

          
          $query = "SELECT * FROM genres" ;
          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $id = $row['genre_id'];
            $name = $row['genre_name'];

            echo"<option value =\"$id\">$name </option>";

            
          }
       ?>

          </select></td>
      </tr>

     <tr>
       <td>Artist </td>
      <td><select name="m_artist" size=1>
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
       <td>Rating</td>
       <td><select name="mrate" size=1>
           <option></option>
          <option value =" 1 ">G</option>
          <option value =" 2 ">PG</option>
          <option value =" 3 ">M</option>
          <option value =" 4 ">R</option>
       </select></td>
      </tr>

      <tr>
       <td>Price</td>
       <td><select name="mcharges" size=1>
          <option></option>

       <?php

          
          $query = "SELECT * FROM charges" ;
          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $charge_id = $row['charge_id'];
            $charge_type = $row['charge_type'];

            echo"<option value =\"$charge_id\">$charge_type </option>";

            
          }
       ?></td>
      </tr>

      <tr>
       <td>Release Date</td>
       <td><input type = "text" class="form-control" name="mrel_date"></td>
      </tr>

      <tr>
      <td>&nbsp;</td>
        <td><button type="submit" name = "add_title" class="btn btn-primary">Add Title </button> </td>
      </tr>

    
    
</div>
</form> 
  <tr>
      <td>&nbsp;</td>
    <td><a href="film_details.php"><button type="submit" name = "fdetail" class="btn btn-primary">Show Film Details </button></a> <a href="delete_film.php"><button type="submit" name = "fdetail" class="btn btn-primary">Delete Film  </button></a></td>

 </table>   
     </div>
    </div>
   </div><!-- div .container-fluid-->



</div><!--div . wrap-->



<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>


<?php  









?>



