<?php
$db_host="localhost";
$db_user='database_user';
$db_pass='database_pass';
$db_name='database_name';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$conn) {
  echo "Not connect";
}

if(isset($_POST['spons_id'])){
    $spid = $_POST['spons_id'];
    $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spid'"));
    $data_num = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spid'"));
    if($data_num >= 1){
    echo "<b>Your Sponsor Name: <span class='text-success'>".$data['name']."</span></b>";
    }
}
