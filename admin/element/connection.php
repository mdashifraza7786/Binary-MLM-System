<?php

session_start();
$db_host="localhost";
$db_user='database_user';
$db_pass='database_password';
$db_name='database_name';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$conn) {
  echo "Not connect";
}

if (isset($_SESSION['session_id']) && isset($_SESSION['user_ashif'])) {
  $my_id=$_SESSION['user_id'];
} else {
  header("Location:index.php");
}
#error_reporting(0);
 ?>
