<?php
$host       = "localhost";
$username   = "root";
$password   = "root";
$db_name    = "LoginSystem";

$conn = mysqli_connect($host, $username, $password, $db_name);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>