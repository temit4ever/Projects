<?php include  "db_connection.php"; 
      include"header.php";
?>
 
  
<div class="col-sm-5 col-xs-5 col-md-9 ">
 
 <p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Film Details</p> 
 <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
  <div class='table-responsive'>  
      <table class="table table-bordered table-striped table-hover table-condensed">
<thead>
     <tr>
         <th>Delete</th><th>Film No </th><th>Title </th><th>Artist Name </th><th>Genre </th><th>Rating</th><th>Price</th><th>Charge Type</th><th>Year Release</th>
    </tr>
</thead>  

<?php
 $cnt =1;

$query = "select f.film_id, f.title, a.artist_name, g.genre_name, f.rating,         ch.amount, ch.charge_type,f.release_yr,f.date
          from films f, artists a, genres g, charges ch
          where f.artist_id = a.artist_id
          and f.genre_id = g.genre_id
          and f.artist_id = a.artist_id
          and f.charge_id = ch.charge_id
          order by film_id";


            $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($result)) 
          {
            $film_id = $row['film_id'];
            $title = $row['title'];
            $artist_name = $row['artist_name'];
            $genre_name = $row['genre_name'];
            $rating = $row['rating'];   
            $amount = $row['amount'];
            $charge_type = $row['charge_type'];
            $release_yr = $row['release_yr'];
            $date = $row['date'];

     $row_cnt = $cnt++;
    $remainder = $row_cnt % 2 ;
    if($remainder == 0)
    {
      $style = "style ='background-color:green; color:white;' ";
    }else
        {
        $style = "style ='background-color:white; color:black;' ";
      }

      


echo" <tbody>";  

              echo"<tr $style>"; 

              echo"<td><input type ='checkbox' name ='".$film_id."' value ='Y'></td>"."\n";

              echo"<td>$film_id </td>"."\n";

             
              echo"<td>$title</td>"."\n";

            
              echo"<td>$artist_name </td>"."\n";

             
              echo"<td>$genre_name </td>"."\n";

              echo"<td>$rating</td>"."\n";

              echo"<td> €$amount </td>"."\n";

              echo"<td>$charge_type </td>"."\n";

              
              echo"<td>$release_yr </td>"."\n";


              echo"<tr>"; 
 echo"</tbody>";  

    if(isset($_POST[$film_id]))
    {
      $checked = $_POST[$film_id];

      if($checked == 'Y')
      {

        delete_film($connection,$film_id,$title,$artist_name,$genre_name,$rating,$amount,$charge_type,$release_yr,$date);

      }
        

    }else
    {

      $checked ='N'; 
      
    }


   }
 
        echo" </table>";
        echo" </div>";

echo" <tr>";
        echo"<td>&nbsp;</td>";
     echo"<td><button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Delete Film</button>  <button type=\"reset\" name = \"reset\" class=\"btn btn-primary\">Reset</button> </td> " ;
echo "</tr>";
  
?>

</form>


<?php

function  delete_film($connection,$film_id,$title,$artist_name,$genre_name,$rating,$amount,$charge_type,$release_yr,$date)
{
 $query = " delete from films where film_id = $film_id ";

 $result = mysqli_query($connection,$query);
     
        if($result)
        {
          echo"<script>alert('$title is deleted successfully!!')</script>";
         
        }else
          { 
             die('Connection Failed'.'<br>'.
            'Mysqli Error : '.mysqli_error($connection).'<br>'.
            'Mysqli Errno: '.'('.mysqli_errno($connection).')');
          
          }



}

?>






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
