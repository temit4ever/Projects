<?php include  "db_connection.php"; 
      include"header.php";
?>


   
<div class="col-sm-9 col-xs-9 col-md-9 ">
<?php

            $return_id = $_GET['id']; //Getting Id from the URL...this is gotten when the url also shows the id on the browser
             

 ?>          





  <div class="table-responsive">
     <table class="table table-bordered table-striped table-hover table-condensed">
        <form  method="post" action="edit_return.php?id=<?php echo $return_id; ?>">
         <p class = "text-center bg-info " style ='font-size:30px;color:purple'>Edit Return</p>
     
<!--Form to search for customers detai-->
 
    <tr> 
        <td>Rent No: </td>
        <td><select name ="myrent_id" size =1>
            <option values =" "> </option>

            <?php

                $query = " select * from rent ";
                $result = mysqli_query($connection,$query) or die (mysqli_error($connection)) ;
                while($row = mysqli_fetch_assoc($result))
                {
                    $rent_id = $row['rent_id'];
                    

                    echo " <option value =$rent_id>$rent_id  </option>";
                }

            ?>
            </option>
        </select>
        </td>
       </tr>



       <tr> 
        <td>Copy No / Title: </td>
        <td><select name ="mycopy_id" size =1>
            <option values =" "> </option>

         <?php

                $query = " select co.copy_id, co.format,f.title 
                        from copies co, films f 
                         where co.film_id = f.film_id";

           $result = mysqli_query($connection,$query) or die (mysqli_error($connection)) ;
                while($row = mysqli_fetch_assoc($result))
                {
                    $copy_id = $row['copy_id'];
                    $format = $row['format'];
                    $title = $row['title'];
                    

                    echo " <option value =$copy_id>$copy_id/$title($format) </option>";
                }

            ?>
            </option>
        </select>
        </td>
       </tr>

 <tr>
    <td> Staff </td>
    <td><select name ="myemployee_id" size = 1>
      <option></option>
<?php
      $query = "select * from employee ";

      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));

      while($row = mysqli_fetch_assoc($result))
      {
        $employee_id= $row['employee_id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];

          echo"<option value =\"$employee_id\">$employee_id :$firstname  $lastname</option>";
      }
        
?>
    </select></td>
  </tr>  

<tr>
       <td> Late Fee </td>
       <td><select name="mycharge_id" size = 1>
           <option> </option>
     

       <?php

          
          $query = " SELECT * from charges ";




          $result = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($result))
          {
            $id = $row['charge_id'];
            $amount = $row['amount'];
            $charge_type = $row['charge_type'];

            echo"<option value =\"$id\">€$amount($charge_type)</option>";
            
          }
            
       ?>
</select>
</td>
</tr>
    <?php
        $return_id = $_GET['id'];

        $query = " select fr.date_return, r.due 
        from film_return fr,rent r
        where return_id = $return_id
        and fr.rent_id = r.rent_id";

        $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
                $row = mysqli_fetch_assoc($result);
                $date_return = $row['date_return'];
                $due = $row['due'];
     ?>



      <tr>
        <td>Due Date:</td>
        <td><input type="text" class="form-control"  name="due" value= "<?php echo $due; ?>" disabled="disabled" "/></td></tr>


        <tr>
        <td>Return Date:</td>
        <td><input type="text" class="form-control"  name="mydate_return" value= "<?php echo $date_return; ?>" disabled="disabled" "/></td></tr>





        <tr>
        <td>&nbsp;</td>
        <td><button type="submit" name = "submit" class="btn btn-primary">Edit </button> 
  </form>  
            <a href="return_detail.php"><button type="submit" name = "submit" class="btn btn-primary">Back </button></a> </td></tr>

 </table> 
 </div> 
 
</div><!-- div .class="col-sm-8-->
<div class="col-sm-3 col-xs-3 col-md-3 ">
<?php 

if (isset($_POST['submit']))
{
            $rent_id = $_POST['myrent_id'];
            
            $copy_id = $_POST['mycopy_id'];
            $employee_id = $_POST['myemployee_id'];   
            $charge_id = $_POST['mycharge_id'];
            
           



    if(!empty($rent_id) && !empty($copy_id) && !empty( $employee_id) && !empty($charge_id) ) 
       
{



$query = "UPDATE film_return SET  rent_id ='$rent_id',employee_id ='$employee_id',charge_id ='$charge_id'
       WHERE return_id =  $return_id ";

            $result = mysqli_query($connection, $query);
           if(!$result)  
           {

                die('Connection Failed : '.'<br>'.
                'MYSQL ERROR'.mysqli_error($connection).'<br>'.
                'MYSQL ERRNO' .'('. mysqli_errno($connection).')');


            }else
            {

                echo"<script>alert('update was success')</script>";
            }
            
}else
        {
             echo"<script>alert('Please fill the field')</script>";

        }

 }

?>
</div>
    
</div><!--div . wrap-->



<!--Javascript -->
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>



</body>
</html>