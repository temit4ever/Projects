<?php include  "db_connection.php"; 
      include"header.php";
?>
 
  
<div class="col-sm-5 col-xs-5 col-md-5 ">
 
 <p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Artist Details</p> 

  <div class='table-responsive'>  
     <table class="table table-bordered table-striped table-hover table-condensed">
      <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

<thead>
     <tr>
         <th>Artist No </th><th>Artist Name</th>
    </tr>
</thead>  

<?php  
		$cnt =1;

   $query = " select * from artists order by artist_id ";

   $result = mysqli_query($connection,$query) or die (mysqli_error($connection));

   while($row = mysqli_fetch_assoc($result))
   {
   	    $artist_id = $row['artist_id'];
        $artist_name = $row['artist_name'];


     $row_cnt = $cnt++;
    $remainder = $row_cnt % 2 ;
    if($remainder == 0)
    {
      $style = "style ='background-color:green; color:white;' ";
    }else
        {
        $style = "style ='background-color:white; color:black;' ";
      }

     echo"<tr $style>"; 

              

              echo"<td>$artist_id </td>"."\n";

             
              echo"<td>$artist_name</td>"."\n";


     
   }




     



    

?>
 </form>  

   	 <tr>
   	 <td>&nbsp;</td>
   	 
   	 <td><a href ="add_artist.php"><button type="submit" name = "artist_details" class="btn btn-primary">Back</button> </a></td></tr>	


   	 
      
    
     	

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
