<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Customize Gallery - CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <a class="navbar-brand" href="index.php" target="_blank">View Hotel</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="dashboard.php?id=1">Dashboard</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li><a href="dashboard.php?id=1">Home<span class="sr-only">(current)</span></a></li>
              <li><a href="editRoom.php">Room & Suites</a></li>
              <li><a href="editFacilities.php">Facilities</a></li>
              <li class="active"><a href="editGallery.php">Gallery</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Customize Gallery</h1>
            <a href="addGallery.php" class="btn btn-success pull-right">Add New Item</a>
            <h2>Gallery List</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="tb-head">
                    <th>Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
  							// Include config file
  						require_once 'include/config.php';

  							// Attempt select query execution
  							$sql = "SELECT * FROM gallery ORDER BY gal_caption ASC";
  							if($result = mysqli_query($link, $sql)){
  									if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td><img src='uploads/". $row['gal_img'] ."' width='50px' height='50px ''></td>";
                                echo "<td>". $row['gal_caption'] ."</td>";
                                echo "<td><a href='include/deleteGallery.php?id=". $row['gal_id'] ."' class='btn btn-danger'>Delete</a>";
                            echo "</tr>";
                          }
                        }else{
                          echo "<tr>";
                            echo "<td colspan='3'><center>No Item(s) Found</center></td>";
                          echo "</tr>";
                        }
                      }
                ?>
              </tbody>
            </table>
          </div>

          </div>

        </div>
      </div>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.min.js"></script>
      <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
      <script src="../../assets/js/vendor/holder.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


  </body>
</html>
