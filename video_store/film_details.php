<?php include  "db_connection.php"; 
      include"header.php";
?>
 
  
<div class="col-sm-5 col-xs-5 col-md-9 ">
 
 <p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Film Details</p> 
  <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover table-condensed'>
    <tr>
     <th>Film No</th><th>Title</th><th>Artist Name</th><th>Genre</th><th>Rating</th><th>Price</th><th>Charge Type</th><th>Year Release</th><th>Action</th>
    </tr> 


<?php
        $cnt=1;

$query = "select f.film_id, f.title, a.artist_name, g.genre_name, f.rating,         ch.amount, ch.charge_type,f.release_yr
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

            $row_cnt = $cnt++;
            $remainder = ($row_cnt % 2);

            if ($remainder == 0)
            {

               $style = "style ='background-color:green; color:blue;' ";

          } else{
                $style = "style ='background-color:yellow; color:black;' ";

            }

            echo " <tr $style> ";
              echo " <td>".$film_id."</td>";
              echo " <td>". $title."</td>";
              echo " <td>".$artist_name."</td>";
              echo " <td>".$genre_name."</td>";
              echo " <td>". $rating."</td>";
              echo " <td>". $amount."</td>";
              echo " <td>". $charge_type."</td>";
              echo " <td>". $release_yr."</td>";
              echo "<td><a href=\"edit_film.php?id='$film_id'\"><button type=\"submit\" name = \"add_copy\" class=\"btn btn-primary\">Edit</button></a></td> ";
    
            echo " </tr>";

        }
        
        ?>
    

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
