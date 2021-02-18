<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/627500d57c.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/Main_page.css">

  <title>Admin Add Product</title>
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
      <li class="breadcrumb-item"><a href="Admin_product_list.php">List of Products</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add a Product</li>
    </ol>
  </nav>
  <!-- Title -->
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="intro">
            <h1> ~ Add a Product ~ </h1>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Form - Adding product info -->
  <div class="pb-5">
    <div class="container pb-4 pt-4 bg-dark">
      <form action="" method="POST" enctype="multipart/form-data">
        <!-- Input - Product ID -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Product ID</label>
            <input class="form-control" type="text" id="product_id" name="product_id" placeholder="Enter the Product Identity" maxlength="15" required method="POST">
          </div>
          <!-- Input - Product Name -->
          <div class="form-group col-md-6">
            <label for="">Product Name</label>
            <input class="form-control" type="text" id="product_name" name="product_name" placeholder="Enter the Product Name" maxlength="30" required method="POST">
          </div>
        </div>
        <!-- Input - Description -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Description</label>
            <input class="form-control" type="text" id="description" name="product_description" placeholder="Enter the Product Description" maxlength="30" required method="POST">
          </div>
          <!-- Select - Product Category -->
          <div class="form-group col-md-6">
            <label for="">Product Category</label>
            <select class="form-control" id="category" name="product_category" required method="POST">
              <option disabled selected required>Choose Product Category</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <!-- Input - Product Price -->
          <div class="form-group col-md-4">
            <label for="">Product Price</label>
            <input class="form-control" type="text" id="price" name="product_price" placeholder="Enter the Product Price" required method="POST">
          </div>
          <!-- Input - Product Quantity  -->
          <div class="form-group col-md-4">
            <label for="">Product Quantity</label>
            <input class="form-control" type="text" id="quantity" name="product_quantity" placeholder="Enter the Product Quantity" required method="POST">
          </div>
          <!-- Input - Image  -->
          <div class="form-group col-md-4">
            <label for="">Upload Image</label>
            <input type="file" class="form-control-file" id="image" name="image" method="POST">
          </div>
        </div>
        <!-- Button - Add -->
        <button class="btn btn-success" type="submit" name="ADD">Add Product</button>
        <!-- A - Delete -->
        <a class="btn btn-danger" href="Admin_product_list.php" role="button">Go Back</a>
      </form>
    </div>
  </div>
  <!--       -->
  <!--  PHP  -->
  <div>
    <?php
    if (isset($_POST['ADD'])) {
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_description = $_POST['product_description'];
      $product_category = $_POST['product_category'];
      $product_price = $_POST['product_price'];
      $product_quantity = $_POST['product_quantity'];
      $image = $_FILES['images']['name'];
      // Image - The path to store the uploaded image
      $target = "images/" . basename($_FILES['images']['name']);
      $checked = 1;
      // Input - Check if everything is OK, not empty
      if ($product_id != "" && $product_name != "" && $product_description != "" && $product_category != "" && $product_price != "" && $product_quantity != "") {
        // Product Price -
        if ($product_price < 1) {
          echo '<span style="color:red;">* Price can only be > 0.</span><br>';
          $checked = 0;
        }
        // Product Quantity -
        if ($product_quantity < 0) {
          echo '<span style="color:red;">* Quantity can only be >= 0.</span><br>';
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
            // Table - Insert info into 
            $sql = "INSERT INTO tblproduct
                        (product_id, product_name, product_description, product_category, product_price, product_quantity, image) 
                        VALUES 
                        ('$product_id', '$product_name', '$product_description', '$product_category', '$product_price', '$product_quantity', '$image')";
            // // Image - moving the uploaded image into the folder: images
            // if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // }
            // Table - Confirm adding to 
            if ($conn->query($sql) == TRUE) {
              echo "New Product Added";
              echo "New record created Successfully";
              echo '<script>setTimeout(\'window.location.href = "Admin_product_list.php"\', 1000);</script>';
            }
            // Table - Cant add to 
            else {
              echo "<br>Error: Cant add to tblproduct, Check if it is already exists <br>" . $sql . "<br>" . $conn->error;
            }
          }
        }
      }
      // Input - Must fill all the form
      else {
        echo '<span style="color:red;">* You must fill the whole form in order to add the new user!</span>';
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