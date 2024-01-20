<?php

session_start();
$db_host="localhost";
$db_user='database_user';
$db_pass='database_pass';
$db_name='database_name';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$conn) {
  echo "Not connect";
}
// print_r($_SESSION);
if (isset($_SESSION['session_id']) && isset($_SESSION['user_id'])) {
  $my_id=$_SESSION['user_id'];
  $my_status = $_SESSION['user_status'];
  $user_gd = $_SESSION['user_gd'];
  setcookie("PHPUSER", $my_id, time() + (86400 * 30), "/");
} else {
  header("Location:login.php");
  exit;
}
#error_reporting(0);
 ?>
