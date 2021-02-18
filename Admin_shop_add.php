<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/627500d57c.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/Main_page.css">

  <title>Admin Add Shop</title>
</head>

<body>
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
      <li class="breadcrumb-item"><a href="Admin_shop_list.php">List of Shops</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add a Shop</li>
    </ol>
  </nav>
  <!-- Title -->
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="intro">
            <h1> ~ Add a Shop ~ </h1>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Form - Adding shop info -->
  <div class="pb-5">
    <div class="container pb-4 pt-4 bg-dark">
      <form method="POST">
        <!-- Input - Shop ID -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Shop ID</label>
            <input class="form-control" type="text" id="shop_id" name="shop_id" placeholder="Enter the Shop Identity" maxlength="15" required autofocus method="POST">
          </div>
          <!-- Input - Shop Name -->
          <div class="form-group col-md-6">
            <label for="">Shop Name</label>
            <input class="form-control" type="text" id="shop_name" name="shop_name" placeholder="Enter the Shop Name" maxlength="30" required method="POST">
          </div>
        </div>
        <!-- Input - Owner ID -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Owner ID</label>
            <input class="form-control" type="text" id="owner_id" name="owner_id" placeholder="Enter the Owner Identity" maxlength="9" required method="POST">
          </div>
          <!-- Input - Owner Name -->
          <div class="form-group col-md-6">
            <label for="">Owner Name</label>
            <input class="form-control" type="text" id="owner_name" name="owner_name" placeholder="Enter the Owner Name" maxlength="30" required method="POST">
          </div>
        </div>
        <!-- Input - Phone -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Owner Phone</label>
            <input class="form-control" type="tel" id="phone" name="owner_phone" placeholder="Enter the Owner Phone" maxlength="10" required method="POST">
          </div>
          <!-- Input - Email -->
          <div class="form-group col-md-6">
            <label for="">Owner Email</label>
            <input class="form-control" type="email" id="email" name="owner_email" placeholder="Enter the Owner Email" maxlength="40" required method="POST">
          </div>
        </div>
        <!-- Select - Shop Location -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Shop Location</label>
            <select class="form-control" id="location" name="shop_location" required method="POST">
              <option disabled selected required>Choose Shop Location</option>
              <option>North</option>
              <option>Center</option>
              <option>South</option>
            </select>
          </div>
          <!-- Input - Status -->
          <div class="form-group col-md-6">
            <label for="">Shop Status</label>
            <select class="form-control" id="shop_status" name="shop_status" required method="POST">
              <option disabled selected required>Choose Shop Status</option>
              <option>0</option>
              <option>1</option>
            </select>
          </div>
        </div>
        <!-- Button - Add -->
        <button class="btn btn-success" type="submit" name="ADD">Add Shop</button>
        <!-- A - Delete -->
        <a class="btn btn-danger" href="Admin_shop_list.php" role="button">Go Back</a>
      </form>
    </div>
  </div>
  <!--       -->
  <!--  PHP  -->
  <div>
    <?php
    if (isset($_POST['ADD'])) {
      $shop_id = $_POST['shop_id'];
      $shop_name = $_POST['shop_name'];
      $owner_id = $_POST['owner_id'];
      $owner_name = $_POST['owner_name'];
      $owner_phone = $_POST['owner_phone'];
      $owner_email = $_POST['owner_email'];
      $shop_location = $_POST['shop_location'];
      $shop_status = $_POST['shop_status'];
      $checked = 1;
      // Input - Check if everything is OK, not empty
      if ($shop_id != "" && $shop_name != "" && $owner_id != "" && $owner_name != "" && $owner_phone != "" && $owner_email != "" && $shop_location != "" && $shop_status != "") {
        // Shop ID -
        if (preg_match('#[^0-9]#', $shop_id)) {
          $checked = 0;
        }
        // Shop Name - 
        if (preg_match('#[^a-zA-Z ]#', $shop_name)) {
          $checked = 0;
        }
        // Owner ID -
        if (preg_match('#[^0-9]#', $owner_id)) {
          $checked = 0;
        }
        // Owner Name - 
        if (preg_match('#[^a-zA-Z ]#', $owner_name)) {
          $checked = 0;
        }
        // Owner Phone - 
        if (preg_match('#[^0-9]#', $owner_phone)) {
          $checked = 0;
        }
        // Owner Email -
        if (!filter_var($owner_email, FILTER_VALIDATE_EMAIL)) {
          echo "EMAIL ERROR";
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
            die("<br>Connection failed: " . mysqli_connect_error());
          }
          // Connecting - If successed
          else {
            // Table - Insert info into tblshop
            $sql = "INSERT INTO tblshop 
                        (shop_id, shop_name, owner_name, owner_id, owner_phone, owner_email, shop_location, shop_status) 
                        VALUES 
                        ('$shop_id', '$shop_name', '$owner_name', '$owner_id', '$owner_phone', '$owner_email' , '$shop_location', '$shop_status')";
            // Table - Confirm adding to tblshop, shop is not exists
            if ($conn->query($sql) == TRUE) {
              echo "New Shop Added.<br>";
              echo "New record created successfully.<br>";
              echo '<script>setTimeout(\'window.location.href = "Admin_shop_list.php"\', 1500);</script>';
            }
            // Table - Shop exists
            else {
              echo "Error: Shop Already Exists.<br>";
              echo "Error Type: " . $conn->error;
              //// echo "<br>Error: Cant add to tblshop, Check if it is already exists <br>" . $sql . "<br>" . $conn->error;
            }
          }
        }
      }
      // Input - Must fill all the form
      else {
        echo '<span style="color:red;">* You must fill the whole form in order to add the new shop!</span>';
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