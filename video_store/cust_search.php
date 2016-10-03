<?php  include("form_funct.php");

        include("header.php");
?>

<div class="col-sm-8 col-xs-8 col-md-8 ">
 
  
 <!--Form to search for customers detai-->

<div class= "col-md-12">

    <?php  
if($custId =trim( $_POST['custId']))
{
  getCustId(); 
  exit;
}

if($custName =trim( $_POST['custName']))
{
getcustName();
exit;
}


if($custSur =trim( $_POST['custSur']))
{

  getcustSur();
exit;

 } else
 {

  echo  "please go back to fill one of the field to check customers Details";
 }
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