<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/627500d57c.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/Main_page.css">

  <title>Admin Shop List</title>
</head>

<body>

  <?php
  include 'includes/Database_connection.inc.php';
  include 'includes/Admin_delete.inc.php';
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
      <li class="breadcrumb-item active" aria-current="page">List of Shops</li>
    </ol>
  </nav>
  <!-- Title -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div id="intro">
          <h1> ~ List of Shops ~ </h1>
          <hr>
        </div>
      </div>
    </div>
  </div>
  <!-- Buttons - Add / Delete -->
  <div class="container pb-3">
    <div class="row">
      <div class="col-lg-12">
        <a class="btn btn-success" href="Admin_shop_add.php" role="button">Add a Shop</a>
        <a class="btn btn-danger" href="Admin_shop_edit.php" role="button">Edit a Shop</a>
      </div>
    </div>
  </div>
  <!-- Shop List -->
  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Shop ID</th>
          <th scope="col">Shop Name</th>
          <th scope="col">Owner ID</th>
          <th scope="col">Owner Name</th>
          <th scope="col">Owner Phone</th>
          <th scope="col">Owner Email</th>
          <th scope="col">Shop Location</th>
          <th scope="col">Shop Status</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <!-- Shop List Body-->
      <tbody class="bg-secondary">

        <?php
        // Selecting data from tblshop
        $sql = "SELECT * FROM tblshop";
        $result = $conn->query($sql);
        // Printing data 
        while ($row = $result->fetch_assoc()) :
        ?>
          <tr>
            <td><?php echo  $row["shop_id"]; ?></td>
            <td><?php echo  $row["shop_name"]; ?></td>
            <td><?php echo  $row["owner_id"]; ?></td>
            <td><?php echo  $row["owner_name"]; ?></td>
            <td><?php echo  $row["owner_phone"]; ?></td>
            <td><?php echo  $row["owner_email"]; ?></td>
            <td><?php echo  $row["shop_location"]; ?></td>
            <td><?php echo  $row["shop_status"]; ?></td>
            <td>
              <a href="Admin_shop_edit.php?edit=<?php echo $row['shop_id']; ?>
                            " class="btn btn-info">Edit
              </a>
              <a href="Admin_delete.inc.php?delete=<?php echo $row['shop_id']; ?>
                            " class="btn btn-danger">Delete
              </a>
            </td>
          </tr>
        <?php endwhile; ?>
        <?php
        // if ($result->num_rows > 0) {
        //     // Output data of each row
        //     while ($row = $result->fetch_assoc()) {
        //         echo "<tr><td>" .
        //             $row["shop_id"] . "<td>" .
        //             $row["shop_name"] . "<td>" .
        //             $row["owner_id"] . "<td>" .
        //             $row["owner_name"] . "<td>" .
        //             $row["owner_phone"] . "<td>" .
        //             $row["owner_email"] . "<td>" .
        //             $row["shop_location"] . "<td>" .
        //             $row["shop_status"] .
        //             "<td></td>
        //             </td></tr>";
        //     }
        // }
        // //
        // else {
        //     echo "0 results";
        // }
        ?>

      </tbody>
    </table>
  </div>

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>