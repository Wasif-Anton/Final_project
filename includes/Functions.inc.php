<?php

// Sign up - Checking if empty
function emptyInputSignup($id, $name, $email, $password, $retype_password, $phone)
{
  $result = null;
  // If it is empty
  if (empty($id) || empty($name) || empty($email) || empty($password) || empty($retype_password) || empty($phone)) {
    $result = true; // There is a mistake
  }
  // If it is NOT empty
  else {
    $result = false; // There is NO mistake
  }
  return $result;
}
// ID 
function invalidId($id)
{
  $result = null;
  // There is a mistake ERROR
  if (!preg_match("/^[0-9]+$/", $id)) {
    $result = true;
  }
  // There is NO mistake
  else {
    $result = false;
  }
  return $result;
}
// Name
function invalidName($name)
{
  $result = null;
  // There is a mistake ERROR
  if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
    $result = true;
  }
  // There is NO mistake
  else {
    $result = false;
  }
  return $result;
}
// Email
function invalidEmail($email)
{
  $result = null;
  // There is a mistake ERROR
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  // There is NO mistake
  else {
    $result = false;
  }
  return $result;
}
// Password
function passwordMatch($password, $retype_password)
{
  $result = null;
  // If Passwords are not equals
  if ($password !== $retype_password) {
    $result = true;
  }
  // If Passwords are equals
  else {
    $result = false;
  }
  return $result;
}
// Phone
function invalidPhone($phone)
{
  $result = null;
  // There is a mistake ERROR
  if (!preg_match("/^[0-9]+$/", $phone)) {
    $result = true;
  }
  // There is NO mistake
  else {
    $result = false;
  }
  return $result;
}

// User Exisits
function uidExisits($conn, $id, $email)
{
  $sql = "SELECT * FROM tbluser WHERE id = ? OR email = ?;";
  $stmt = mysqli_stmt_init($conn);
  // If fail
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: Sign_up.php?error=stmtfaild");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $id, $email);
  mysqli_stmt_execute($stmt);
  // Graping data
  $resultData = mysqli_stmt_get_result($stmt);
  // If there is data for the user
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  //
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

// Creat User
function creatUser($conn, $id, $name, $email, $password, $phone, $location)
{
  $sql = "INSERT INTO tbluser (id, name, email, password, phone, location) VALUES (?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  // If fail
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: Sign_up.php?error=stmtfaild");
    exit();
  }
  // Hashing Password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  // If not fail
  mysqli_stmt_bind_param($stmt, "ssssss", $id, $name, $email, $hashedPassword, $phone, $location);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../Login.php?error=none");
  exit();
}

// Login - Checking if empty
function emptyInputLogin($id, $password)
{
  $result = null;
  // If it is empty
  if (empty($id) || empty($password)) {
    $result = true; // There is a mistake
  }
  // If it is NOT empty
  else {
    $result = false; // There is NO mistake
  }
  return $result;
}

// Login
function loginUser($conn, $id, $pwd)
{
  // Admin Login
  if ($id === "admin") {
    if ($pwd === "1") {
      header("location: ../Admin_home.php");
      exit();
    }
  }
  // User Login
  $uidExists = uidExisits($conn, $id, $id); // Passing ID OR Email
  // Wrong login
  if ($uidExists === false) {
    header("location: ../Login.php?error=wronglogin");
    exit();
  }
  // Checking Password
  $pwdHashed = $uidExists["password"]; // Grapping password and save in into pwdHashed
  $checkPwd = password_verify($pwd, $pwdHashed); // Check if the password is right
  // If password is Wrong
  if ($checkPwd === false) {
    header("location: ../Login.php?error=wronglogin");
    exit();
  }
  // If password is Right
  else if ($checkPwd === true) {
    session_start();

    $_SESSION["id"] = $uidExists["id"];
    header("location: ../User_home.php");
    exit();
  }
}
