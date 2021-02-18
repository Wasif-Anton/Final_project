<?php

$server_name  = 'localhost';
$db_username = "root";
$db_password = '';
$db_name = 'project_db';

// Create connection
$conn =  mysqli_connect($server_name, $db_username, $db_password, $db_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
