<?php
include "session_start.php";
/* Making connection*/
include  "db_connection.php";

echo'<link rel ="stylesheet" href="css/project_style.css">';
function send_message()
{

global $connection;

if(isset($_POST['submit']))
 {
   
       if(!empty($_POST['user']) && !empty($_POST['passw']))
    {
         $user_id = trim($_POST['user']);
         $newpassw = trim($_POST['passw']);

     

         /*To protect against MySQL injection*/
        $user_id = stripslashes($user_id);
        $newpassw = stripslashes($newpassw);
        $user_id = mysqli_real_escape_string($connection,$user_id);
        $newpassw = mysqli_real_escape_string($connection,$newpassw);

         $query = "select firstname,lastname from employee " ;
         $query.=" where employee_id = '$user_id' && password = '$newpassw' LIMIT 1 ";

         $result= mysqli_query($connection,$query) or die(mysqli_error($connection));

          $row = mysqli_fetch_assoc($result);

          $firstname = $row['firstname'];
          $lastname = $row['lastname'];

          echo" YOU are : ".$firstname.'  '.$lastname; 
          $count = mysqli_num_rows($result);

         
         
         if ($count > 0)
        {
          $_SESSION['user'];
          $_SESSION['passw'];

          
          header("Location: menu.php?id='$user_id'");
           
          
        }else
          {
            
            
             echo"<script style='color:red'>alert('Log-In Failed. Wrong User Name / Password')</script>";

          }



        }else

        {
          
               header("Location: redirect.php");
        }

     


    
     }

   ob_end_flush () ;

   


}

/* Search By Customer Id*/

function getCustId()
{

   global  $connection;

    $print =""; 
    $output ="";
if(isset($_POST['submit']))
{
    if(!empty($_POST['custId']) || !empty($_POST['custName']) || !empty($_POST['custSur'])) 
    {

            $custId =trim( $_POST['custId']);
            
            $query = "SELECT * FROM customers where cust_id = $custId";
          
             $result= mysqli_query($connection,$query) or die(mysqli_error($connection));
             $rows_num = mysqli_affected_rows($connection);

           


                  $cust_detail = mysqli_fetch_assoc($result);
                  
                         $cust_no = $cust_detail['cust_id'];
                         $firstname = $cust_detail['firstname'];
                         $surname = $cust_detail['surname'];
                         $phone = $cust_detail['phone'];
                         $address = $cust_detail['address'];
                         $dob = $cust_detail['dob'];
                         $comment = $cust_detail['comment']; 
                        $unpaid = $cust_detail['unpaid'];

                          echo"<div class='table-responsive'>";
           echo"<table class='table table-bordered table-striped table-hover table-condensed'>" ;

              echo"<p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Customer Details</p> "; 

              echo"<tr><td>Customer No:</td>"; 
              echo"<td>$cust_no </td></tr>";

              echo"<tr><td>Firstname:</td>"; 
              echo"<td>$firstname</td></tr>";

              echo"<tr><td>Surname:</td>"; 
              echo"<td>$surname </td></tr>";

              echo"<tr><td>Phone:</td>"; 
              echo"<td>$phone </td></tr>";

              echo"<tr><td>Address:</td>"; 
              echo"<td>$address </td></tr>";

              echo"<tr><td>DOB:</td>"; 
              echo"<td>$dob </td></tr>";

              echo"<tr><td>Comment:</td>"; 
              echo"<td>$comment </td></tr>";

              
              
       echo" <tr>";
        echo"<td>&nbsp;</td>";
        echo"<td><a href=\"cust_info.php?id='$cust_no'\"><button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Customer Status</button></a> <a href=\"edit.php?id='$cust_no'\"> <button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Edit Customer</button></a> <a href=\"delete_cust.php?id='$cust_no'\"> <button type=\"submit\" name = \"delete\" class=\"btn btn-primary\">Delete Customer</button></a></td></tr>";

               
             echo "</table> ";
           echo" </div> ";
            
       
                     

   }else
        {  

           echo  "please go back to fill one of the field to check customers Details";
        }

}
        




}

/* Search By Firstname*/


function getCustName()
{
global $connection;    
    

    $print =""; 
    $output ="";
if(isset($_POST['submit']))
{
    if(!empty($_POST['custId']) || !empty($_POST['custName']) || !empty($_POST['custSur'])) 
    {

            $custName =trim( $_POST['custName']);
            $custName = mysqli_real_escape_string($connection, $custName);

            $query = "SELECT * FROM customers where firstname LIKE '$custName%'";
          
             $result= mysqli_query($connection,$query) or die(mysqli_error($connection));
             $rows_num = mysqli_affected_rows($connection);

           


        while($cust_detail = mysqli_fetch_assoc($result))
          {
                  
                         $cust_no = $cust_detail['cust_id'];
                         $firstname = $cust_detail['firstname'];
                         $surname = $cust_detail['surname'];
                         $phone = $cust_detail['phone'];
                         $address = $cust_detail['address'];
                         $dob = $cust_detail['dob'];
                         $comment = $cust_detail['comment'];
                        

               echo"<div class='table-responsive'>";
           echo"<table class='table table-bordered table-striped table-hover table-condensed'>" ;

              echo"<p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Customer Details</p> "; 

              echo"<tr><td>Customer No:</td>"; 
              echo"<td>$cust_no </td></tr>";

              echo"<tr><td>Firstname:</td>"; 
              echo"<td>$firstname</td></tr>";

              echo"<tr><td>Surname:</td>"; 
              echo"<td>$surname </td></tr>";

              echo"<tr><td>Phone:</td>"; 
              echo"<td>$phone </td></tr>";

              echo"<tr><td>Address:</td>"; 
              echo"<td>$address </td></tr>";

              echo"<tr><td>DOB:</td>"; 
              echo"<td>$dob </td></tr>";

              echo"<tr><td>Comment:</td>"; 
              echo"<td>$comment </td></tr>";

              
       echo" <tr>";
        echo"<td>&nbsp;</td>";
        echo"<td><a href=\"cust_info.php?id='$cust_no'\"><button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Customer Status</button></a> <a href=\"edit.php?id='$cust_no'\"> <button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Edit Customer</button></a> <a href=\"delete_cust.php?id='$cust_no'\"> <button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Delete Customer</button></a></td></tr>";

               
             echo "</table> ";
           echo" </div> ";
            
}
     
     $output.="Number(s) of  Affected Rows: ".$rows_num."<br>";   
     echo $output;  

      }else
        {  

           echo  "please go back to fill one of the field to check customers Details";
        }
    
}
           

}

/* Search By Surname*/
function getCustSur()
{
    global $connection;    
    

    $print =""; 
    $output ="";
if(isset($_POST['submit']))
{
    if(!empty($_POST['custId']) || !empty($_POST['custName']) || !empty($_POST['custSur'])) 
    {

            $custSur =trim( $_POST['custSur']);
            $custSur = mysqli_real_escape_string($connection, $custSur);

            $query = "SELECT * FROM customers where surname LIKE '$custSur%'";
          
             $result= mysqli_query($connection,$query) or die(mysqli_error($connection));
             $rows_num = mysqli_affected_rows($connection);

           


        while($cust_detail = mysqli_fetch_assoc($result))
          {
                  
                         $cust_no = $cust_detail['cust_id'];
                         $firstname = $cust_detail['firstname'];
                         $surname = $cust_detail['surname'];
                         $phone = $cust_detail['phone'];
                         $address = $cust_detail['address'];
                         $dob = $cust_detail['dob'];
                         $comment = $cust_detail['comment'];


               echo"<div class='table-responsive'>";
           echo"<table class='table table-bordered table-striped table-hover table-condensed'>" ;

              echo"<p class = 'text-center bg-info' style ='font-size:30px;color:purple'>Customer Details</p> "; 

              echo"<tr><td>Customer No:</td>"; 
              echo"<td>$cust_no </td></tr>";

              echo"<tr><td>Firstname:</td>"; 
              echo"<td>$firstname</td></tr>";

              echo"<tr><td>Surname:</td>"; 
              echo"<td>$surname </td></tr>";

              echo"<tr><td>Phone:</td>"; 
              echo"<td>$phone </td></tr>";

              echo"<tr><td>Address:</td>"; 
              echo"<td>$address </td></tr>";

              echo"<tr><td>DOB:</td>"; 
              echo"<td>$dob </td></tr>";

              echo"<tr><td>Comment:</td>"; 
              echo"<td>$comment </td></tr>";

             
              
       echo" <tr>";
        echo"<td>&nbsp;</td>";
        echo"<td><a href=\"cust_info.php?id='$cust_no'\"><button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Customer Status</button></a> <a href=\"edit.php?id='$cust_no'\"> <button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Edit Customer</button></a> <a href=\"delete_cust.php?id='$cust_no'\"> <button type=\"submit\" name = \"submit\" class=\"btn btn-primary\">Delete Customer</button></a></td></tr>";

               
             echo "</table> ";
           echo" </div> ";
            
}
     
     $output.="Number(s) of  Affected Rows: ".$rows_num."<br>";   
     echo $output;  

      }else
        {  

           echo  "please go back to fill one of the field to check customers Details";
        }
    
}
           

}




     function search_title()
     {

      global $connection;   

    if(isset($_POST['search']))
    {

      $mtitle = $_POST['mtitle'];

     if(!empty($mtitle))
{



        $query ="SELECT f.film_id,f.title,ar.artist_name,g.genre_name,f.rating,f.release_yr
                  from films f, artists ar,genres g
                  where title like '%$mtitle%'
                  and  f.artist_id = ar.artist_id
                  and f.genre_id = g.genre_id";

       $result = mysqli_query($connection, $query) or  die(mysqli_error($connection));
   
 
      echo"<div class='table-responsive'>";
          echo"<table class='table table-bordered table-striped table-hover table-condensed'>" ; 

           echo "<tr style='align:center;color:red'>
     <th>Film No</th><th>Title</th><th>Artist Name</th><th>Genre</th><th>Rating</th><th>Year Release</th>
         </tr>";            

    while($row =mysqli_fetch_assoc($result))
    {

        $film_id = $row['film_id'];
        $title = $row['title'];
        $artist =$row['artist_name'];
        $genre = $row['genre_name'];
        $rating =$row['rating'];
        $release =$row['release_yr'];

              echo "<tr>";
              echo"<td>".$film_id."</td>";
              echo"<td>".$title."</td>";
              echo"<td>".$artist."</td>";
              echo"<td>".$genre."</td>";
              echo"<td>".$rating."</td>";
              echo"<td>".$release."</td>";
              echo "</tr>";

               
    }

            
  echo " </table>";

  echo "</div>";
      
   echo " <script>alert('Found Movie Title that contain words \"$mtitle\" ')</script>";

     }

}

}



?>







