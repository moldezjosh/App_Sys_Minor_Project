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

    <title>Customize Facilities - CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <body>

      <?php include 'include/nav.php'; ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li><a href="dashboard.php?id=1">Home<span class="sr-only">(current)</span></a></li>
              <li class="active"><a href="editRoom.php">Room & Suites</a></li>
              <li><a href="editFacilities.php">Facilities</a></li>
              <li><a href="editGallery.php">Gallery</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Customize Room and Suites</h1>
            <a href="addRoom.php" class="btn btn-success pull-right">Add New Item</a>
            <h2>Room & Suites List</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="tb-head">
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
  							// Include config file
  						require_once 'include/config.php';

  							// Attempt select query execution
  							$sql = "SELECT * FROM rooms ORDER BY room_name ASC";
  							if($result = mysqli_query($link, $sql)){
  									if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td><img src='uploads/". $row['room_img'] ."' width='50px' height='50px ''></td>";
                                echo "<td>". $row['room_name'] ."</td>";
                                echo "<td>". $row['room_description'] ."</td>";
                                echo "<td>". $row['room_rate'] ."</td>";
                                echo "<td><a href='include/deleteRoom.php?id=". $row['room_id'] ."' class='btn btn-danger'>Delete</a>";
                            echo "</tr>";
                          }
                        }else{
                          echo "<tr>";
                            echo "<td colspan='5'><center>No Item(s) Found</center></td>";
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


  </body>
</html>
