<?php

require_once 'Database_connection.inc.php';
require_once 'Functions.inc.php';

if (isset($_POST['SIGNUP'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $retype_password = $_POST['retype_password'];
  $phone = $_POST['phone'];
  $location = $_POST['location'];

  // If input is empty
  if (emptyInputSignup($id, $name, $email, $password, $retype_password, $phone) !== false) {
    header("location: ../Sign_up.php?error=emptyinput");
    exit();
  }
  // ID - 
  if (invalidId($id) !== false) {
    header("location: ../Sign_up.php?error=invalidid");
    exit();
  }
  // Name - 
  if (invalidName($name) !== false) {
    header("location: ../Sign_up.php?error=invalidname");
    exit();
  }
  // Email - 
  if (invalidEmail($email) !== false) {
    header("location: ../Sign_up.php?error=invalidemail");
    exit();
  }
  // Password - not match
  if (passwordMatch($password, $retype_password) !== false) {
    header("location: ../Sign_up.php?error=passwordnotmatch");
    exit();
  }
  // Phone - 
  if (invalidPhone($phone) !== false) {
    header("location: ../Sign_up.php?error=invalidphone");
    exit();
  }
  // If user exisits
  if (uidExisits($conn, $id, $email) !== false) {
    header("location: ../Sign_up.php?error=idoremailtaken");
    exit();
  }
  creatUser($conn, $id, $name, $email, $password, $phone, $location);
}
// 
else {
  header("location: ../Sign_up.php");
  exit();
}
