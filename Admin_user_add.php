<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/627500d57c.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/Main_page.css">

  <title>Admin Add User</title>
</head>

<body>

  <?php
  include_once 'includes/Database_connection.inc.php';
  ?>

  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">BuyShop</a>
      <!-- Icons - Right Side - Logout -->
      <a class="nav-link text-danger" href="includes/Logout.inc.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </nav>
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb breadcrumb-fixed" style="padding-top: 7%;">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="Admin_home.php">Admin Home</a></li>
      <li class="breadcrumb-item"><a href="Admin_user_list.php">List of Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add a User</li>
    </ol>
  </nav>
  <!-- Title -->
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="intro">
            <h1> ~ Add a User ~ </h1>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Form - Adding user info -->
  <div class="pb-5">
    <div class="container pb-4 pt-4 bg-dark">
      <form method="POST">
        <!-- Row 1 -->
        <div class="form-row">
          <!-- Input - User ID -->
          <div class="form-group col-md-6">
            <label for="">User ID</label>
            <input class="form-control" type="text" id="id" name="user_id" placeholder="Enter the User Identity" maxlength="9" required method="POST">
          </div>
          <!-- Input - User Name -->
          <div class="form-group col-md-6">
            <label for="">User Name</label>
            <input class="form-control" type="text" id="name" name="user_name" placeholder="Enter the User Name" maxlength="30" required method="POST">
          </div>
        </div>
        <!-- Row 2 -->
        <div class="form-row">
          <!-- Input - Email -->
          <div class="form-group col-md-6">
            <label for="">User Email</label>
            <input class="form-control" type="email" id="email" name="user_email" placeholder="Enter the User Email" maxlength="40" required method="POST">
          </div>
          <!-- Input - Phone -->
          <div class="form-group col-md-6">
            <label for="">User Phone</label>
            <input class="form-control" type="tel" id="phone" name="user_phone" placeholder="Enter the User Phone" maxlength="10" required method="POST">
          </div>

        </div>
        <!-- Row 2 -->
        <div class="form-row">
          <!-- Select - User Location -->
          <div class="form-group col-md-6">
            <label for="">User Location</label>
            <select class="form-control" id="location" name="user_location" required method="POST">
              <option disabled selected required>Choose User Location</option>
              <option>North</option>
              <option>Center</option>
              <option>South</option>
            </select>
          </div>
          <!-- Input - Status -->
          <div class="form-group col-md-6">
            <label for="">User Status</label>
            <select class="form-control" id="user_status" name="user_status" required method="POST">
              <option disabled selected required>Choose User Status</option>
              <option>0</option>
              <option>1</option>
            </select>
          </div>
        </div>
        <!-- Button - Add -->
        <button class="btn btn-success" type="submit" name="ADD">Add User</button>
        <!-- A - Delete -->
        <a class="btn btn-danger" href="Admin_user_list.php" role="button">Go Back</a>
      </form>
    </div>
  </div>
  <!--       -->
  <!--  PHP  -->
  <div>
    <?php
    if (isset($_POST['ADD'])) {
      $user_id = $_POST['user_id'];
      $user_name = $_POST['user_name'];
      $user_phone = $_POST['user_phone'];
      $user_email = $_POST['user_email'];
      $user_location = $_POST['user_location'];
      $user_status = $_POST['user_status'];
      $checked = 1;
      // Input - Check if everything is OK, not empty
      if ($user_id != "" && $user_name != "" && $user_phone != "" && $user_email != "" && $user_location != "" && $user_status != "") {
        // User ID -
        if (preg_match('#[^0-9]#', $user_id)) {
          $checked = 0;
        }
        // User Name - 
        if (preg_match('#[^a-zA-Z ]#', $user_name)) {
          $checked = 0;
        }
        // User Phone - 
        if (preg_match('#[^0-9]#', $user_phone)) {
          $checked = 0;
        }
        // User Email -
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
          $checked = 0;
        }
        // Databse
        // Input - If all inputs right
        if ($checked == 1) {
          // Connect to database
          // Localhost, Username, Password, Database name
          $conn = new mysqli("localhost", "root", "", "project_db");
          // Connecting - If failed
          if ($conn->connect_error) {
            die("Connection failed: " . mysqli_connect_error());
          }
          // Connecting - If successed
          else {
            echo "Connected Successfully<br>";
            // Table - Insert info into 
            $sql = "INSERT INTO tbluser 
                        (user_name, user_id, user_phone, user_email, user_location, user_status) 
                        VALUES 
                        ('$user_name', '$user_id', '$user_phone', '$user_email' , '$user_location', '$status')";
            // Table - Confirm adding to tbluser
            if ($conn->query($sql) == TRUE) {
              echo "New User Added<br>";
              echo "New record created successfully<br>";
              echo '<script>setTimeout(\'window.location.href = "Admin_user_list.php"\', 1000);</script><br>';
            }
            // Table - Cant add to tbluser
            else {
              echo "Error: Cant add to tbluser, Check if it is already exists <br>" . $sql . "<br>" . $conn->error;
            }
          }
        }
      }
      // Input - Must fill all the form
      else {
        echo '<span style="color:red;">* You must fill the whole form in order to add the new user!</span><br>';
      }
    }
    ?>
  </div>

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>