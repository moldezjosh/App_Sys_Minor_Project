<?php
 include('include/config.php');
 // Initialize the session
 session_start();

 // If session variable is not set it will redirect to login page
 if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
   header("location: login.php");
   exit;
 }

 $id =  1;

 // Prepare a select statement
 $sql = "SELECT * FROM home WHERE home_id = ?";
 if($stmt = mysqli_prepare($link, $sql)){
     // Bind variables to the prepared statement as parameters
     mysqli_stmt_bind_param($stmt, "i", $param_id);

     // Set parameters
     $param_id = $id;

     // Attempt to execute the prepared statement
     if(mysqli_stmt_execute($stmt)){
         $result = mysqli_stmt_get_result($stmt);

         if(mysqli_num_rows($result) == 1){
             /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
             $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

             // Retrieve individual field value
             $name = $row["hotel_name"];
         } else{
             // URL doesn't contain valid id. Redirect to error page
           header("location: error.php");
           exit();
         }

     } else{
         echo "Oops! Something went wrong. Please try again later.";
     }
 }

 // Close statement
 mysqli_stmt_close($stmt);


 ?>
