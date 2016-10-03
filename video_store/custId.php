<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--  Help to scale to fit screen either large medium or small    -->

      <title> Menu</title>
    <script src="js/respond.js"></script>
    <link rel ="stylesheet" href="css/bootstrap.min.css">
    <link rel ="stylesheet" href="css/custom_style.css">
    <link rel ="stylesheet" href="css/project_style.css">
</head>


<body class="bdy">

<div class="wrap">

  <!--Preparing the main page-->
 
  <div class="container-fluid">
     <div class="row">
 
 <div class ="col-md-3">
<form method="post" action="">
<input type="hidden" name="custId">

 </div>



<div class="col-sm-7 col-xs-7  col-md-7 " style="margin-top:px;">
 
  
  <?php    
    include  "db_connection.php";  
     
   

$output ="";
 $rows_num="";



/* Gathering data from Form*/

      if (isset ($_POST['custId']))
  {
    echo' <input type = "hidden" name = "custId" size = 11 value ="'.$custId.'">';
    echo' <input type = "hidden" name = "firstname" size = 25 value ="'.$$firstname.'">';
    echo' <input type = "hidden" name = "surname" size = 25 value ="'.$surname.'">';
    echo' <input type = "hidden" name = "phone" size = 25 value ="'.$phone.'">';
    echo' <input type = "hidden" name = "address" size = 25 value ="'.$address.'">';
    echo' <input type = "hidden" name = "dob" size = 25 value ="'.$dob.'">';
    echo' <input type = "hidden" name = "comment" size = 25 value ="'.$comment.'">';
    
  }
    $owner_id = $_REQUEST['cust_id'];
    
      $query = "SELECT * FROM customers where cust_id = '$owner_id ' ";
     

       $result= mysqli_query($connection,$query) or die(mysqli_error($connection));
       $rows_num = mysqli_affected_rows($connection);
       if (!$result) 
          {
              die("Error: Data not found..");
          }
           
                   $custId =['cust_id'];
                   $firstname =['firstname'];
                   $surname = ['surname'];
                   $phone = ['phone'];
                   $address = ['address'];
                   $dob = ['dob'];
                   $comment = ['comment'];
?>
    

<form method="post" action="editecex.php">
 <input type="hidden" name="id" value="<?php echo $custId; ?>" />



<?php
          $remainder="";
          $cnt =1;


            while($cust_detail = mysqli_fetch_assoc($result))
            {
                   $cust_no = $cust_detail['cust_id'];
                   $firstname = $cust_detail['firstname'];
                   $surname = $cust_detail['surname'];
                   $phone = $cust_detail['phone'];
                   $address = $cust_detail['address'];
                   $dob = $cust_detail['dob'];
                   $comment = $cust_detail['comment'];

                   $num_row = $cnt++;
                   $remainder = ($num_row % 2);

                    if($remainder== 0)
                    {
                      $style = "class='info' ";

                    }else
                      {
                        $style = "class='danger' ";
                      }

          $output.="<tbody >";
            $output.="<tr $style>";

              $output.="<td>".$cust_no."</td>";
              $output.="<td>".$firstname. '  ' .$surname."</td>";
              $output.="<td>".$phone."</td>";
              $output.="<td>".$address."</td>";
              $output.="<td>".$dob."</td>";

               if (empty($comment))
               {
                 $comment ="&nbsp";

               }

                $output.= "<td>".$comment."</td>";
              $output."<tr>\n";
            $output.="</tbody>";

                      
          }   

          $output.="</table>";


          $output.="Number(s) of  Affected Rows: ".$rows_num."<br>";

    
            
       
        echo $output;
         

?>

   </div>
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