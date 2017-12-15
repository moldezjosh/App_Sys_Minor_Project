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
                 <li><a href="login.php">Login</a></li>
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


       <div class="search-text">
          <div class="container">
            <div class="row text-center">

              <div class="form">
                  <h4>SIGN UP TO OUR NEWSLETTER</h4>
                   <form id="search-form" class="form-search form-horizontal">
                       <input type="text" class="input-search" placeholder="Email Address">
                       <button type="submit" class="btn-search">SUBMIT</button>
                   </form>
               </div>

             </div>
          </div>
   	</div>

       <footer>
        <div class="container">
          <div class="row">

                   <div class="col-md-4 col-sm-6 col-xs-12">
                     <span class="logo">LOGO</span>
                   </div>

                   <div class="col-md-4 col-sm-6 col-xs-12">
                       <ul class="menu">
                            <span>Menu</span>
                            <li>
                               <a href="index.php">Home</a>
                             </li>

                             <li>
                                <a href="rooms.php">Room & Suites</a>
                             </li>

                             <li>
                               <a href="facilities.php">Facilities</a>
                             </li>

                             <li>
                                <a href="gallery.php">Gallery</a>
                             </li>
                        </ul>
                   </div>

                   <div class="col-md-4 col-sm-6 col-xs-12">
                     <ul class="adress">
                           <span>Contact</span>
                           <li>
                              <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">Phone</a>
                           </li>
                           <li>
                              <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">Adress</a>
                           </li>
                           <li>
                              <i class="fa fa-envelope" aria-hidden="true"></i> <a href="#">Email</a>
                           </li>
                      </ul>
                  </div>


              </div>
           </div>
       </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
