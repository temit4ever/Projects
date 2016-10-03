<?php
include "session_start.php";
/* Making connection*/
include  "db_connection.php";


   		//gather data from form
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

	   $query = "select title,lastname from employee ";
	   $query.="where ssn = '$user_id' && password = '$newpassw' LIMIT 1 ";

	   $result= mysqli_query($connection,$query) or die(mysqli_error($connection));

      $count = mysqli_num_rows($result);

      if ($count > 0)
      {
          $_SESSION['user'];
          $_SESSION['passw'];

          echo " Welcome to Admin. You User Id is ".$user_id;
          header("Location: menu.php");
          
       }
           
           else
		      {
		      	
		      	
		      	 header("Location: redirect.php");

		      }



        }else

        {
        	 header("Location: redirect.php");
        	


        }
/*
	   

*/
	  
	   }

   ob_end_flush () ;

   ?>