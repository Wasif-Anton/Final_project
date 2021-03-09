<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/627500d57c.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/xcss.css">

  <title>Sign Up</title>
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
  <!-- Form - User info -->
  <div class="text-center">
    <form class="form-signin" action="includes/Sign_up.inc.php" method="POST">
      <div class="container">
      <fieldset>
        <div class="row">
          <div class="col-lg-12">
            <h1 class="h3 mb-3 font-weight-normal">Please Sign Up</h1>
            <!-- Input - ID -->
            <div class="form-group">
              <input class="form-control form-control-sm" type="text" name="id" placeholder="Identity" maxlength="9"  method="POST" autofocus required>
            </div>
            <!-- Input - Name -->
            <div class="form-group">
              <input class="form-control form-control-sm" type="text" name="name" placeholder="Name" maxlength="30" method="POST" required>
            </div>
            <!-- Input - Email -->
            <div class="form-group">
              <input class="form-control form-control-sm" type="email" name="email" placeholder="Email" maxlength="40" method="POST" required>
            </div>
            <!-- Input - Password -->
            <div class="form-group">
              <input class="form-control form-control-sm" id="password" type="password" name="password" placeholder="Password" maxlengthr="20" method="POST" required>
            </div>
            <!-- Input - Retype Password -->
            <div class="form-group">
              <input class="form-control form-control-sm" id="retype_password" type="password" name="retype_password" placeholder="Retype Password" maxlength="20" method="POST" required>
            </div>
            <!-- Adding JS cheking password -->
            <!-- Input - Phone Number -->
            <div class="form-group">
              <input class="form-control form-control-sm" type="tel" name="phone" placeholder="Phone Number" maxlength="10" method="POST" required>
            </div>
            <!-- Select, Input - Location: North / Center / South -->
            <div class="form-group form-check-inline form-control-sm">
              Location:
              <select class="form-control form-control-sm" id="Location" name="location" method="POST" required>
                <option value="" disabled selected required>Select Your Location</option>
                <option value="North">North</option>
                <option value="Center">Center</option>
                <option value="South">South</option>
              </select>
            </div>
            <br><br><br>
            <!-- Button - Sign Up -->
            <button class="btn btn-outline-success btn-lg btn-block p-0 p-md-2" type="submit" name="SIGNUP">Sign up</button>
            <!-- P, A - Already have an account? -->
            <p class="font-size-sm pt-3 mb-0 text-center">Already have an account? <a href="Login.php" class="font-weight-medium" data-view="#signin-view">Sign in</a></p>
            <hr>
          </div>
        </div>
      </div>
    </fieldset>
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
      else if ($_GET["error"] == "invalidid") {
        echo "<p>Your ID is Invalid</p>";
      }
      // Name - Invaild name
      else if ($_GET["error"] == "invalidname") {
        echo "<p>Your Name is Invalid</p>";
      }
      // Email - Invalid email
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Your Email is Invalid</p>";
      }
      // Password - 
      else if ($_GET["error"] == "passwordnotmatch") {
        echo "<p>Your Password is not matched</p>";
      }
      // Phone - 
      else if ($_GET["error"] == "invalidphone") {
        echo "<p>Your Phone is in use</p>";
      }
      // User exists - 
      else if ($_GET["error"] == "idoremailtaken") {
        echo "<p>Your ID or Email is in use</p>";
      }
      // Stmt Faild
      else if ($_GET["error"] == "stmtfaild") {
        echo "<p>Somthing went wrong, try again!</p>";
      }
      // No Errors
      else if ($_GET["error"] == "none") {
        echo "<p>You Have Sign Up!</p>";
      }
    }
    ?>
  </div>

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

<!-- Setting JS for password check -->
<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("retype_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
    confirm_passwordt.reportValidity() 
     // no match

  } else {
    confirm_password.setCustomValidity('');
    
         // yes match

  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

</html>