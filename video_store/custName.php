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
            
      <div class="col-sm-11 col-xs-11  col-md-11 " style="margin-top:px;">
  
  
  
  
 <!--Form to search for customers detai-->

<?php  
include  "db_connection.php";
$output ="";
 $rows_num="";


/* Gathering data from Form*/

if(isset($_POST['submit']))
{ 

    if(!empty($_POST['custName']))
    {

      $custName =trim( $_POST['custName']);


      $custName = stripslashes($custName);
      $custName = mysqli_real_escape_string($connection,$custName);

      $query = "SELECT * FROM customers where firstname LIKE '$custName%'";
     

       $result= mysqli_query($connection,$query) or die(mysqli_error($connection));
       $rows_num = mysqli_affected_rows($connection);
     

    


$output.='<div class="row">';
 $output.='<div class="table-responsive">';
  $output.='<table class="table table-bordered table-striped table-hover table-condensed">';
  $output.='<caption class="text-center cap" style=";">Customers Details </caption>';
              $output.='<thead>';
              $output.='  <tr>';
               $output.='<th>Customer No</th><th> Names</th><th>Phone</th><th>Address</th><th>DOB</th><th>comment</th>';
               $output.=' </tr>';
             $output.=' </thead>';

  

          $remainder="";
          $cnt =1;


            while($cust_detail = mysqli_fetch_assoc($result))
            {
                   $firstname = $cust_detail['firstname'];
                   $cust_no = $cust_detail['cust_id'];
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

          $output.="Number(s) of  Affected Rows: ".$rows_num;

    } 
         echo $output;
         
      
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