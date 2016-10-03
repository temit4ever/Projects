<?php include  "db_connection.php"; 
      include"header.php";
?>
 
  
<div class="col-sm-5 col-xs-5 col-md-5 ">
 
  
  <h3 class =" bg-info" style="color:purple">Please Enter Movies </h3>

  
 <!--Form to search for customers detai-->
<?php
if(isset($_POST['add_artist']))
{
    $artistName =$_POST['artistName'];
    

    if( empty($artistName))  
    {

      echo"<script>alert('Please Fill all field')</script>";

    }else
          {


        $query= " INSERT INTO artists(artist_name) VALUES ('$artistName') ";

        $result = mysqli_query($connection, $query);

        if(!$result)
        {
            $errno = mysqli_errno($connection);
           if($errno == '1062')
          {

          echo" The Artist with Name <b style='color:blue;>'>$artistName</b>  is already in the List"; 
            exit; 
          } // help to check for error in mysqli syntax

          

        }else
        {


           echo"<script>alert('$artistName is added!!')</script>";

        }




          }



}


?>



 <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover table-condensed'>    
       <form role="form" method="post" action="add_artist.php" enctype="multipart/form-data">   

      <tr>
       <td>Artist Name</td>
       <td><input type = "text" class="form-control" name="artistName">
      </tr>

      <tr>
      <td>&nbsp;</td>

       
      
        <td>
           <button type="submit" name = "add_artist" class="btn btn-primary">Add Artist</button> 
   
      

    </form>
    <a href ="artist_details.php"> <button type="submit" name = "artist_details" class="btn btn-primary">Show Artist</button></a></td></tr>
      
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



