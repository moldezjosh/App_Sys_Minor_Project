<?php
 include('include/config.php');

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
             $description = $row["hotel_description"];
             $bg_image = $row["home_bg"];
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

 // Close connection
 mysqli_close($link);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $name; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    <style>
    .site-wrapper {
      background-image: url("uploads/<?php echo $bg_image; ?>");
      background-repeat: no-repeat, repeat;
    }
    </style>
  <body>

    <div class="site-wrapper">

     <div class="site-wrapper-inner">

       <div class="container">

         <div class="masthead clearfix">
           <div class="container inner">
             <h3 class="masthead-brand"><a href="index.php"><?php echo $name; ?></a></h3>
             <nav>
               <ul class="nav masthead-nav">
                 <li class="active"><a href="index.php">Home</a></li>
                 <li><a href="rooms.php">Room & Suites</a></li>
                 <li><a href="facilities.php">Facilities</a></li>
                 <li><a href="gallery.php">Gallery</a></li>
                 <li><a href="login.php">Login</a></li>
               </ul>
             </nav>
           </div>
         </div>

         <div class="inner cover">
           <h1 class="cover-heading" style="color: white"><?php echo $name; ?></h1>
           <p class="lead" style="color: white"><?php echo $description; ?></p>
           <p class="lead">
             <a href="rooms.php" class="btn btn-lg btn-default">Learn more</a>
           </p>
         </div>

       </div>

     </div>

   </div>
   <div id="footer">

   </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
