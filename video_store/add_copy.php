<?php include  "db_connection.php"; 
      include"header.php";
?>
 
  
<div class="col-sm-5 col-xs-5 col-md-5 ">
 
  
  <h3 class =" bg-info" style="color:purple">Please Movie Copy </h3>

  
 <!--Form to search for customers detai-->
<?php
if(isset($_POST['add_copy']))
{
    $film_id =$_POST['film_id'];
    $format =$_POST['fformat'];
    

    



    if( empty($film_id) || empty($format))  
    {

      echo"<script>alert('Please Fill all field')</script>";

    }else
          {


        $query= " INSERT INTO copies(film_id, format) VALUES ('$film_id','$format')";

        $result = mysqli_query($connection, $query);

        if(!$result)
        {
          die (mysqli_error($connection)); // help to check for error in mysqli syntax


        }else
        {
           echo"<script>alert('Film copy is added!!')</script>";

        }




          }

 

           
}


?>

 <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover table-condensed'> 

<form role="form" method="post" action="add_copy.php" enctype="multipart/form-data">


      <tr>
       <td> Film Title:</td>
      <td><select name="film_id" size=1>
          <option></option>
       <?php

          
          $query = "SELECT * FROM films" ;
          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $id = $row['film_id'];
            $title = $row['title'];

            echo"<option value =\"$id\">$id----$title </option>";

            
          }
       ?>

          </select></td>
      </tr>




      <tr>
       <td>Rating</td>
       <td><select name="fformat" size=1>
           <option></option>
          <option value =" 1 ">DVD</option>
          <option value =" 2 ">VCD</option>
          <option value =" 3 ">3D</option>
         
       </select></td>
      </tr>

<tr>
      <td>&nbsp;</td>
        <td><button type="submit" name = "add_copy" class="btn btn-primary">Add Film Copy </button> </td>
      </tr>


   </form>
   </table>
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


<?php  









?>



