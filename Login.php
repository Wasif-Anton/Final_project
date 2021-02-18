<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/627500d57c.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/xcss.css">

  <title>Login</title>
</head>

<body>
  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="Index.php"><span class="buy">Buy</span><span class="shop">Shop</span></a>
      <!-- Hamburger -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contact Website Owners
            </a>
            <!-- Dropdown - Info -->
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Wasif Anton:</a>
              <a class="dropdown-item"><i class="fas fa-phone"></i> +972 54-468-3385</a>
              <a class="dropdown-item"><i class="fas fa-envelope"></i> wasifanton@gmail.com</a>
              <hr style="width: 300px;">
              <a class="dropdown-item" href="#">Hosny Ashy:</a>
              <a class="dropdown-item"><i class="fas fa-phone"></i> +972 54-289-9366</a>
              <a class="dropdown-item"><i class="fas fa-envelope"></i> x.atv.73@gmail.com</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Form - ID and Password -->
  <div class="text-center">
    <form class="form-signin" action="includes/Login.inc.php" method="POST">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <!-- ID -->
            <div class="form-group">
              <input class="form-control" type="text" name="id" placeholder="Identity" maxlength="9" required autofocus method="POST">
              <small class="form-text text-muted alert alert-success" id="emailHelp">We'll never share your Identity with anyone else.</small>
            </div>
            <!-- Password -->
            <div class="form-group">
              <input class="form-control" type="password" name="password" id="password" placeholder="Password" maxlength="20" required method="POST">
            </div>
            <!-- Button - Login -->
            <button class="btn btn-outline-success btn-lg btn-block p-0 p-md-2" type="submit" name="LOGIN">Login</button>
            <!-- P - Sign Up -->
            <p class="font-size-sm pt-3 mb-0 text-center">Don't have an account? <a href="Sign_up.php" class="font-weight-medium" data-view="#signup-view">Sign up</a></p>
            <hr>
          </div>
        </div>
      </div>
    </form>
    <!--     -->
    <!-- PHP -->
    <?php
    // Error Check - Message
    if (isset($_GET["error"])) {
      // Empry Input -
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
      }
      // ID - Invalid ID
      else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login information!</p>";
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