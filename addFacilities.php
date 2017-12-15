<?php
// Include config file
require_once 'include/config.php';

// Define variables and initialize with empty values
$name = $description = "";
$name_err = $description_err = "";

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

    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $decription_err = 'Please enter a description.';
    } else{
        $description = $input_description;
    }

    $image = rand(1000,100000)."-".$_FILES['files']['name'];
    $filename = $_FILES['files']['name'];
    $file_loc = $_FILES['files']['tmp_name'];
    $folder="uploads/";

    // Check input errors before inserting in database
    if(empty($name_err) && empty($description_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO facilities (faci_img, faci_name, faci_description) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_faci_img, $param_name, $param_description);

            // Set parameters
            $param_faci_img = $image;
            $param_name = $name;
            $param_description = $description;


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                move_uploaded_file($file_loc,$folder.$image);
                // Records created successfully. Redirect to landing page
                ?>
                <script>
                  // success message
                    alert('Successfully Added');
                    window.location.href='editFacilities.php';
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
          window.location.href='editFacilites.php';
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

    <title>Customize Facilities - CMS</title>

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
              <li class="active"><a href="editFacilities.php">Facilities</a></li>
              <li><a href="editGallery.php">Gallery</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Customize Facilities</h1>
            <h2>Add a Facility</h2>

              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-form-label">Facility Name</label>
                <input type="text" class="form-control" name="name" placeholder="Facility Name">
                <span class="help-block"><?php echo $name_err;?></span>
              </div>
              <div class="form-group">
                <label class="col-form-label">Description</label>
                <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
                <span class="help-block"><?php echo $description_err;?></span>
              </div>

              <label class="col-form-label" for="formGroupExampleInput">Upload an Image</label>
              <input type="file" name="files" id="files" accept="image/jpeg" required/><br><br>

              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="editRoom.php" class="btn btn-default">Cancel</a>
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


  </body>
</html>
