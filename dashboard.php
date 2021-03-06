<?php
// Include config file
require_once 'include/config.php';
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

// Define variables and initialize with empty values
$name = $description="";
$name_err = $description_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];


    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = 'Please enter a hotel name.';
    } else{
        $name = $input_name;
    }

    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = 'Please enter a description.';
    } else{
        $description = $input_description;
    }

    if($_FILES['files']['error'] == 0){
      $file_loc = $_FILES['files']['tmp_name'];
      list($width, $height, $type, $attr) = getimagesize($file_loc);
      if($width>='1600' && $height>='900'){
        $image = "dashboardcover.jpg";
        $folder="uploads/";
      }else{
        ?>
        <script>
          // success message
            alert('Image is too small. Minimum dimensions are 1600x900 pixels.');
            window.location.href='dashboard.php?id=1';
        </script>
        <?php
        exit();
      }
    }

    // Check input errors before inserting in database
    if(empty($description_err) && empty($name_err)){
      if($_FILES['files']['error'] == 0){
        // Prepare an update statement
        $sql = "UPDATE home SET hotel_name=?, hotel_description=?, home_bg=? WHERE home_id=?";
      }else{
        // Prepare an update statement
        $sql = "UPDATE home SET hotel_name=?, hotel_description=? WHERE home_id=?";
      }

        if($stmt = mysqli_prepare($link, $sql)){
            if($_FILES['files']['error'] == 0){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_description, $param_home_bg, $param_id);
            }else{
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_description, $param_id);
            }

            // Set parameters
						$param_name = $name;
            $param_description = $description;
            $param_id = $id;
            if($_FILES['files']['error'] == 0){
              $param_home_bg = $image;
            }

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              if($_FILES['files']['error'] == 0){
                move_uploaded_file($file_loc,$folder.$image);
              }

                // Records updated successfully. Redirect to landing page
                ?>
                <script>
                  // success message
                    alert('Successfully updated');
                    window.location.href='dashboard.php?id=1';
                </script>
                <?php
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

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
                    $cover_img = $row['home_bg'];
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
       exit();
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customize Home - CMS</title>

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
              <li class="active"><a href="dashboard.php?id=1">Home<span class="sr-only">(current)</span></a></li>
              <li><a href="editRoom.php">Room & Suites</a></li>
              <li><a href="editFacilities.php">Facilities</a></li>
              <li><a href="editGallery.php">Gallery</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Customize Home</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-form-label" for="formGroupExampleInput">Hotel Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" id="formGroupExampleInput" placeholder="Hotel Name">
                  <span class="help-block"><?php echo $name_err;?></span>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="formGroupExampleInput2">Description</label>
                  <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description"><?php echo $description; ?></textarea>
                  <span class="help-block"><?php echo $description_err;?></span>
                </div>

                <label class="col-form-label" for="formGroupExampleInput">Upload a Background Image</label>
                <input type="file" name="files" id="files" accept="image/jpeg"/><br><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                <input type="submit" class="btn btn-primary" value="Update">
            </form>



          </div>
        </div>
      </div>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="js/bootstrap.min.js"></script>


  </body>
</html>
