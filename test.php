<?php
header('Cache-Control: no-cache');
include 'element/connection.php';
$spons = "119896";
$pla_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spons'"));
  if($pla_data['left_side']!="" && $pla_data['right_side']!=""){
      echo  "pair generated";
  }