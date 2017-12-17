<?php
  require_once 'include/getHotelName.php';
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
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/equal.css" rel="stylesheet">
    <style>
    .site-wrapper {

      background-image: url("img/cafe.jpg");
      background-repeat: no-repeat, repeat;
    }

    .page-title {
      height: 200px;

    }
    .page-title h2, .page-title h4 {
      font-family: "Didot W01 Roman",Didot,"Hoefler Text",Garamond,"Times New Roman",serif;
      text-shadow: none;
    }
    .page-title h2 {
      font-size: 50px;
      margin-top: 70px;
    }

    .page-title h4 {
      font-size: 30px;
    }
    .thumbnail p {
      text-shadow: none;
    }

    </style>
  <body>

    <div class="site-wrapper">

     <div class="site-wrapper-inner">

       <div class="container">

         <div class="masthead clearfix">
           <div class="container inner" style="background-color: #333; z-index: 1">
             <h3 class="masthead-brand"><a href="index.php"><?php echo $name; ?></a></h3>
             <nav>
               <ul class="nav masthead-nav">
                 <li><a href="index.php">Home</a></li>
                 <li><a href="rooms.php">Room & Suites</a></li>
                 <li><a href="facilities.php">Facilities</a></li>
                 <li class="active"><a href="gallery.php">Gallery</a></li>
               </ul>
             </nav>
           </div>
         </div>

         <main role="main">
           <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading" style="color: white">Gallery</h1>
          </div>
      </section>

    </main>

       </div>

     </div>

   </div>

 <!-- Container (Portfolio Section) -->
 <div id="portfolio" class="container-fluid text-center bg-grey">
   <div class="page-title">
   <h2>Gallery</h2><br>
   <h4><i>High Style and Harbour Living</i></h4>
 </div>
   <div class="row text-center slideanim">
     <div class="row row-eq-height">
     <?php

     // Attempt select query execution
     $sql = "SELECT * FROM gallery ORDER BY gal_caption ASC";
     if($result = mysqli_query($link, $sql)){
         if(mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_array($result)){
             echo "<div class='col-sm-4'>";
               echo "<div class='thumbnail'>";
                 echo "<img src='uploads/". $row['gal_img'] ."' width='400' height='300'><br>";
                 echo "<p><strong>". $row['gal_caption'] ."</strong></p>";
               echo "</div>";
               echo "</div>";
             }
           }
         }
        ?>
     </div>
   </div>
 </div>

       <?php include 'include/footer.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
