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
if(isset($_REQUEST['activate'])){
  $user_id = $_REQUEST['user_id'];
  $user_status = $_REQUEST['user_status'];
  $s_id = $_REQUEST['sponsor_id'];
  mysqli_query($conn,"UPDATE `users` SET `user_status`='$user_status', `member_type`='1' WHERE `user_id`='$user_id'");
  // $a=0;
  $income=[400,300,100,100,100,100,100,100,100,100];
  $date = date("Y-m-d");
  $dtime = date("H:i:s");
  for ($a = 0; $a < 10; $a++) {
  if($s_id != 0){
    mysqli_query($conn,"UPDATE `wallet` SET `amount`=`amount`+$income[$a] WHERE `user_id`='$s_id'");
    mysqli_query($conn,"INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `datee`,`dtime`, `cr_dr`) VALUES ('$s_id','$income[$a]','Level Income', '$date','$dtime', '0')");
    $datau=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
    $next_id=$datau['sponsor_id'];
    $s_id=$next_id;
  }
  }
  header("Location: ../users.php");
  exit;
}
if(isset($_REQUEST['deactivate'])){
  $user_id = $_REQUEST['user_id'];
  $user_status = $_REQUEST['user_status'];
  mysqli_query($conn,"UPDATE `users` SET `user_status`='$user_status', `member_type`='0' WHERE `user_id`='$user_id'");
  header("Location:../users.php");
}
if (isset($_REQUEST['approve_withdraw'])) {
  $rerq_id=$_REQUEST['req_id'];
  $date=date("Y-m-d");
  mysqli_query($conn,"UPDATE `witdrawl` SET `status`='1',`approve_date`='$date' WHERE `id`='$rerq_id'");
  header("Location:../withdraw_request.php");
}

if (isset($_REQUEST['transfer_pair_income'])) {

  $user_ida=$_REQUEST['user_id'];
  $amt=$_REQUEST['amount'];
  $date=$_REQUEST['date'];
  $datea = date("Y-m-d H:i:s");
  mysqli_query($conn,"UPDATE `wallet` SET `amount`=`amount`+$amt WHERE `user_id`='$user_ida'");
  mysqli_query($conn,"UPDATE `pair_count` SET `status`='1' WHERE `user_id`='$user_ida' AND `date`='$date'");
  mysqli_query($conn,"INSERT INTO `income_history`( `user_id`, `amt`, `desp`, `datee`, `cr_dr`) VALUES ('$user_ida','$amt','PAIR INCOME', '$datea', '0')");
  
  header("Location:../transfer_pair_income.php");
}

if (isset($_REQUEST['pin_transfer'])) {
  $agent_id=$_REQUEST['id'];
  $pin_count=$_REQUEST['pin_count'];
  $time=date("Y-m-d H:i:s");
  mysqli_query($conn,"INSERT INTO `pin_transfer_history`(`agent_id`, `pin_count`, `time`) VALUES ('$agent_id','$pin_count','$time')");
  while ($pin_count!=0) {
    $pin=rand(10000,55555);
    mysqli_query($conn,"INSERT INTO `pin`(`pin_value`, `allcote_user`, `status`) VALUES ('$pin','$agent_id','0')");
    $pin_count--;
  }
  header("Location:../pin.php");
}

if (isset($_REQUEST['profile_update_password'])) {
  $my_id=$_REQUEST['my_user_id'];
  $password=$_REQUEST['password'];
  $c_password=$_REQUEST['confirm_password'];
  if ($password==$c_password) {
    mysqli_query($conn,"UPDATE `users` SET `password`='$c_password' WHERE `user_id`='$my_id'");
  }
  header("location:../profile.php?myid=$my_id");
}

if (isset($_REQUEST['profile_update_basic'])) {
  $my_id=$_REQUEST['my_user_id'];
  $dob=$_REQUEST['dob'];
  $gender=$_REQUEST['gender'];
  $address=$_REQUEST['address'];
  $pan_no=$_REQUEST['pan_no'];
  $aadhar_no=$_REQUEST['aadhar_no'];
  $mob=$_REQUEST['mob'];
  $status=$_REQUEST['status'];
  mysqli_query($conn,"UPDATE `users` SET `status`='$status', `mobile`='$mob',`dob`='$dob',`gender`='$gender',`address`='$address',`panno`='$pan_no',`aadharno`='$aadhar_no' WHERE `user_id`='$my_id'");
  header("Location:../profile.php?myid=$my_id");
}

if (isset($_REQUEST['login'])) {
  $user_id=$_REQUEST['user_id'];
  $password=$_REQUEST['password'];
  move_to_dashboard($user_id,$password);
}

if (isset($_REQUEST['user_registration'])) {
  $s_id=$_REQUEST['sponsor_id'];
  $pin=$_REQUEST['pin'];
  $name=$_REQUEST['user_name'];
  $pos=$_REQUEST['position'];
  $mobile=$_REQUEST['user_mob'];
  $password=$_REQUEST['password'];

  if(check_pin($pin)){
    insert_into_users($s_id,$name,$pos,$mobile,$password);
    binary_count($s_id,$pos);
  }
  header("Location:../registration.php");
}

function binary_count($spons,$pos){
  global $conn;
  if ($pos==0) {
    $pos="left_count";
  } else {
    $pos="right_count";
  }
  while ($spons!=0) {
    mysqli_query($conn,"UPDATE `users` SET `$pos`=`$pos`+1 WHERE `user_id`='$spons'");
    is_pair_generate($spons);
    $pos=find_position($spons);
    $spons=find_placement_id($spons);
  }
}

function is_pair_generate($spons){
  global $conn;
  $pla_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spons'"));
  if ($pla_data['left_count']==$pla_data['right_count']) {
    $date=date("Y-m-d");
    $data=mysqli_query($conn,"SELECT * FROM `pair_count` WHERE `date`='$date' AND `user_id`='$spons'");
    if (mysqli_num_rows($data)==1) {
      mysqli_query($conn,"UPDATE `pair_count` SET `no_of_pair`=`no_of_pair`+1 WHERE `date`='$date' AND `user_id`='$spons'");
    } else {
      mysqli_query($conn,"INSERT INTO `pair_count`(`user_id`, `date`, `no_of_pair`) VALUES ('$spons','$date','1')");
    }
  }
}


function check_pin($pin){
  global $conn;
  $query=mysqli_query($conn,"SELECT * FROM `pin` WHERE `pin_value`='$pin' AND `status`='0'");
  if (mysqli_num_rows($query)==1) {
    mysqli_query($conn,"UPDATE `pin` SET `status`='1' WHERE `pin_value`='$pin'");
    return true;
  }
  return false;
}

function insert_into_users($s_id,$name,$pos,$mobile,$password){
  global $conn;
  $date = date("Y-m-d");
  $user_id=rand(11111111,99999999);
  mysqli_query($conn,"INSERT INTO `users`(`user_id`, `name`, `password`, `mobile`, `position`, `sponsor_id`) VALUES ('$user_id','$name','$password','$mobile','$pos',$s_id)");
  mysqli_query($conn,"INSERT INTO `wallet`(`user_id`, `amount`, `date`) VALUES ('$user_id','0','$date')");
  level_distribution($s_id);
  placement_id($user_id,$s_id,$pos);
}

function placement_id($user_id,$s_id,$pos){
  global $conn;
  $spons_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
  if ($pos==0) {
    if ($spons_data['left_side']==0) {
      mysqli_query($conn,"UPDATE `users` SET `left_side`='$user_id' WHERE `user_id`='$s_id'");
      mysqli_query($conn,"UPDATE `users` SET `placement_id`='$s_id'  WHERE `user_id`='$user_id'");
      binary_count($s_id,$pos);
    } else {
      placement_id($user_id,$spons_data['left_side'],$pos);
    }
  } else {
    if ($spons_data['right_side']==0) {
      mysqli_query($conn,"UPDATE `users` SET `right_side`='$user_id' WHERE `user_id`='$s_id'");
      mysqli_query($conn,"UPDATE `users` SET `placement_id`='$s_id'  WHERE `user_id`='$user_id'");
      binary_count($s_id,$pos);
    } else {
      placement_id($user_id,$spons_data['right_side'],$pos);
    }
  }
}

function level_distribution($s_id){
  global $conn;
  $date = date("Y-m-d H:i:s");
  $a=0;
  $income=[20,10,5,5,5,5];
  while ($a < 6 && $s_id!=0) {

    mysqli_query($conn,"UPDATE `wallet` SET `amount`=`amount`+$income[$a] WHERE `user_id`='$s_id'");
    mysqli_query($conn,"INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `datee`, `cr_dr`) VALUES ('$s_id','$income[$a]','Level Income', '$date','0')");
    $next_id=find_sponsor_id($s_id);
    $s_id=$next_id;
  }

}

function find_sponsor_id($s_id){
  global $conn;
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
  return $data['sponsor_id'];
}

function find_placement_id($s_id){
  global $conn;
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
  return $data['placement_id'];
}

function find_position($s_id){
  global $conn;
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
  $pos=$data['position'];
  if ($pos==0) {
    $pos="left_count";
  } else {
    $pos="right_count";
  }
  return $pos;
}

function move_to_dashboard($user_id,$pass){
  global $conn;
  $query=mysqli_query($conn,"SELECT * FROM `admin` WHERE `user_id`='$user_id' AND `password`='$pass'");
  if (mysqli_num_rows($query)==1) {
    $_SESSION['session_id']=session_id();
    $_SESSION['admin_id']=$user_id;
    header("Location:../dashboard.php");
  } else {
    header("Location:../index.php");
    exit;
  }
}
 ?>
