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
$name = "";
$name_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a Room name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid name.';
    } else{
        $name = $input_name;
    }

    $image = rand(1000,100000)."-".$_FILES['files']['name'];
    $filename = $_FILES['files']['name'];
    $file_loc = $_FILES['files']['tmp_name'];
    $folder="uploads/";

    // Check input errors before inserting in database
    if(empty($name_err) && empty($description_err) && empty($rate_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO gallery (gal_img, gal_caption) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_gal_img, $param_gal_caption);

            // Set parameters
            $param_gal_img = $image;
            $param_gal_caption = $name;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                move_uploaded_file($file_loc,$folder.$image);
                // Records created successfully. Redirect to landing page
                ?>
                <script>
                  // success message
                    alert('Successfully updated');
                    window.location.href='editGallery.php';
                </script>
                <?php
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }else{
      ?>
      <script>
        // success message
          alert('Error Uploading File');
          window.location.href='editGallery.php';
      </script>
      <?php
    }

    // Close connection
    mysqli_close($link);
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

      <?php include 'include/nav.php'; ?>

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
            <h2>Add Item to Gallery</h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-form-label">Description</label>
                <input type="text" class="form-control" name="name">
                <span class="help-block"><?php echo $name_err;?></span>
              </div>

              <label class="col-form-label" for="formGroupExampleInput">Upload an Image</label>
              <input type="file" name="files" id="files" accept="image/jpeg" required/><br><br>

              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="editGallery.php" class="btn btn-default">Cancel</a>
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
      <script src="js/jquery.min.js"></script>
      <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
      <script src="../../assets/js/vendor/holder.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


  </body>
</html>
