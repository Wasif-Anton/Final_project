<?php

$server_name  = 'localhost';
$db_username = "root";
$db_password = '';
$db_name = 'project_db';

$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

// If connecting FAILED
if (!$conn) {
  die("Connection failed: " . mysqli_connect_errno());
}

if (isset($_GET['delete'])) {
  $shop_id = $_GET['delete'];
  $sql->query("DELETE FROM tblshop WHERE id=$id") or die($mysqli->error());
}
