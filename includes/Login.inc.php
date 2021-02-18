<?php

require_once 'Database_connection.inc.php';
require_once 'Functions.inc.php';

if (isset($_POST['LOGIN'])) {
  $id = $_POST['id'];
  $password = $_POST['password'];

  // If input is empty
  if (emptyInputLogin($id, $password) !== false) {
    header("location: ../Login.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $id, $password);
}
//
else {
  header("location: ../Login.php");
  exit();
}
