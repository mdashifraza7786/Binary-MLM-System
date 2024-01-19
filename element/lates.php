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
if(isset($_REQUEST['reset'])){
  ini_set("SMTP", "mail.piiwell.com");
  ini_set("sendmail_from", "no-reply@piiwell.com");
  
  $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
  $sss = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email='$email'"));
  $sql = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='$email'"));
  if($sql > 0){

$receiving_email_address = $email;
$from_email = "no-reply@piiwell.com";
$full_name = "PiiWell";
$from_mail = $full_name.'<'.$from_email.'>';
$subject = "Reset Password - PiiWell";
$txt = "Hi,".$sss['name']."\r\n\r\n You have requested to change your  password. Reset link given below click on link and reset your password \r\n\r\n\r\n  https://piiwell.com/reset-password.php?reset=" . base64_encode($sss['password']). "&verify=".base64_encode($sss['user_id'])."\r\n\r\n\r\n Thanks & Regards, \r\n PiiWell";
$headers = "From: ".$from_mail. "\r\n";
                                                
if(mail($receiving_email_address,$subject,$txt,$headers)) {
    echo "<p style='color:green;'>".$sss['name'].", Your Password Reset Link has Been Sent. On Your Email ".$email." . \r\n if you are not getting mail then check spam folder</p>";
} else {
    echo "<p style='color:red;'>Something went wrong pls try again later.</p><br>";
}

}else{
    echo "<p style='color:red;'>Email Doesn't Exits.</p><br>";
}
}

if (isset($_REQUEST['profile_update_password'])) {
  $my_id=mysqli_real_escape_string($conn, $_REQUEST['my_user_id']);
  $password=sha1(mysqli_real_escape_string($conn, $_REQUEST['password']));
  $c_password=sha1(mysqli_real_escape_string($conn, $_REQUEST['confirm_password']));
  if ($password==$c_password) {
    $swl = mysqli_query($conn,"UPDATE `users` SET `password`='$c_password' WHERE `user_id`='$my_id'");
    if($swl){
      header("location:../change-password.php?m=1");
    }
  }else{
    header("location:../change-password.php?m=2");
  }
  
}

if (isset($_POST['reset_p'])) {
  $my_id=mysqli_real_escape_string($conn, $_POST['reset_p']);
  $password=sha1(mysqli_real_escape_string($conn, $_REQUEST['n_password']));
  $swl = mysqli_query($conn,"UPDATE `users` SET `password`='$password' WHERE `user_id`='$my_id'");
    if($swl){
       echo "<p style='color:green;'>Your Password Has Been Reset Successfully. Now You Can Login Your Account With New Password.</p><br>";
    }
  
}

if(isset($_POST['profile_update_banking'])){
  $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
  $bank_holder_name = mysqli_real_escape_string($conn, $_POST['bank_holder_name']);
  $bank_acc_no = mysqli_real_escape_string($conn, $_POST['bank_acc_no']);
  $bank_ifsc = mysqli_real_escape_string($conn, $_POST['bank_ifsc']);
  $bank_branch = mysqli_real_escape_string($conn, $_POST['bank_branch']);
  $urr = "UPDATE `users` SET `bank_name`='$bank_name', `account_holder`='$bank_holder_name', `account_no`='$bank_acc_no', `ifsc`='$bank_ifsc', `branch`='$bank_branch' WHERE `user_id`='$my_id'";
  $upd = mysqli_query($conn,"UPDATE `users` SET `bank_name`='$bank_name', `account_holder`='$bank_holder_name', `account_no`='$bank_acc_no', `ifsc`='$bank_ifsc', `branch`='$bank_branch' WHERE `user_id`='$my_id'");
  if($conn->query($urr) === TRUE){
    header('Location:../bank.php?m=1');
  }
}

if (isset($_REQUEST['profile_update_basic'])) {
  $my_id=mysqli_real_escape_string($conn, $_REQUEST['my_user_id']);
  $dob=mysqli_real_escape_string($conn, $_REQUEST['dob']);
  $gender=mysqli_real_escape_string($conn, $_REQUEST['gender']);
  $address=mysqli_real_escape_string($conn, $_REQUEST['address']);
  $pan_no=mysqli_real_escape_string($conn, $_REQUEST['pan_no']);
  $aadhar_no=mysqli_real_escape_string($conn, $_REQUEST['aadhar_no']);
  $mob=mysqli_real_escape_string($conn, $_REQUEST['mob']);
  mysqli_query($conn,"UPDATE `users` SET `mobile`='$mob',`dob`='$dob',`gender`='$gender',`address`='$address',`panno`='$pan_no',`aadharno`='$aadhar_no' WHERE `user_id`='$my_id'");
  header("Location:../profile.php");
}

if (isset($_REQUEST['withdrawl_request'])) {
  $date = date("Y-m-d H:i:s");
  $amt=mysqli_real_escape_string($conn, $_REQUEST['amount']);
  $user_id=mysqli_real_escape_string($conn, $_REQUEST['user_id']);
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT `amount` FROM `wallet` WHERE `user_id`='$user_id'"));
  if ($amt>="500") {
    $date=date("Y-m-d");
    mysqli_query($conn,"UPDATE `wallet` SET `status`=1 WHERE `user_id`='$user_id'");
    mysqli_query($conn,"INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `datee`, `cr_dr`) VALUES ('$user_id','$amt','withdraw', '$date', '1')");
    mysqli_query($conn,"INSERT INTO `witdrawl`( `user_id`, `amt`, `request_date`) VALUES ('$user_id','$amt','$date')");
  }
  header("Location:../withdraw.php");
}

if (isset($_REQUEST['login'])) {
  $user_id=mysqli_real_escape_string($conn, $_REQUEST['user_id']);
  $passworda=mysqli_real_escape_string($conn, $_REQUEST['password']);
  $password = sha1($passworda);
  
  move_to_dashboard($user_id,$password);
}
if(isset($_REQUEST['pin'])){
  if (isset($_REQUEST['user_registration'])) {
  $user_id=rand(111111,999999);
  $s_id=$_REQUEST['sponsor_id'];
  $pin=$_REQUEST['pin'];
  $name=$_REQUEST['user_name'];
  $pos=$_REQUEST['position'];
  $mobile=$_REQUEST['user_mob'];
  $password=$_REQUEST['password'];
  if(check_pin($pin)){
    insert_into_users($user_id,$s_id,$name,$pos,$mobile,$password);
  }
  header("Location:../registration.php?id=".$user_id)."&user_id=".$s_id;
}
}else{
  if (isset($_REQUEST['user_registration'])) {
    $user_id=rand(111111,999999);
    $s_id=mysqli_real_escape_string($conn, $_REQUEST['sponsor_id']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['user_mail']);
    $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
    $name=mysqli_real_escape_string($conn, $_REQUEST['user_name']);
    $pos=mysqli_real_escape_string($conn, $_REQUEST['position']);
    $mobile=mysqli_real_escape_string($conn, $_REQUEST['user_mob']);
    $password=sha1(mysqli_real_escape_string($conn, $_REQUEST['password']));
    $datas=mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='$email'");
    $datas_num = mysqli_num_rows($datas);
    if($pos == 1){
      $poa = "right";
    }else{
      $poa = "left";
    }
    if($datas_num >= 1){
      header("Location:../registration.php?m=2&id=".$user_id."&user_id=".$s_id."&side=".$pos);
    }else{
        
        
    $sqlaa = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$s_id'");
    $rowaa = mysqli_fetch_array($sqlaa);
    if($poa != "right"){
    while($rowaa['left_side'] > 0){
        
        $sqlaa = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$s_id'");
        $rowaa = mysqli_fetch_array($sqlaa);
        if($rowaa['left_side'] == ""){
            $s_id = $rowaa['user_id'];
            insert_into_users($user_id,$email,$s_id,$name,$pos,$mobile,$password,$gender);
            header("Location:../registration.php?m=1&id=".$user_id."&user_id=".$s_id);
        }
    }
}elseif($poa != "left"){
    while($rowaa['right_side'] > 0){
        $sqlaa = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$s_id'");
        $rowaa = mysqli_fetch_array($sqlaa);
        if($rowaa['right_side'] == ""){
        $s_id = $rowaa['user_id'];
        insert_into_users($user_id,$email,$s_id,$name,$pos,$mobile,$password,$gender);
        header("Location:../registration.php?m=1&id=".$user_id."&user_id=".$s_id);
        }
    }
}
        
        
    //   insert_into_users($user_id,$email,$s_id,$name,$pos,$mobile,$password,$gender);
    //   header("Location:../registration.php?m=1&id=".$user_id."&user_id=".$s_id);
    }
    
  }
  if (isset($_REQUEST['user_registrations'])) {
    $user_id=rand(111111,999999);
    $s_id=mysqli_real_escape_string($conn, $_REQUEST['sponsor_id']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['user_mail']);
    $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
    $name=mysqli_real_escape_string($conn, $_REQUEST['user_name']);
    $pos=mysqli_real_escape_string($conn, $_REQUEST['position']);
    $mobile=mysqli_real_escape_string($conn, $_REQUEST['user_mob']);
    $password=sha1(mysqli_real_escape_string($conn, $_REQUEST['password']));
    $cpassword=sha1(mysqli_real_escape_string($conn, $_REQUEST['cpassword']));
    if($password === $cpassword){
    $datas=mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='$email'");
    $datas_num = mysqli_num_rows($datas);
    
    if($datas_num >= 1){
      header("Location:../signup.php?m=3&id=".$user_id);
    }else{
      insert_into_users($user_id,$email,$s_id,$name,$pos,$mobile,$password,$gender);
    header("Location:../signup.php?m=1&id=".$user_id);
    }
    }else{
      header("Location:../signup.php?m=2&id=".$user_id);
    }
  }
}


// if (isset($_REQUEST['user_registration'])) {
//   $s_id=$_REQUEST['sponsor_id'];
//   $pin=$_REQUEST['pin'];
//   $name=$_REQUEST['user_name'];
//   $pos=$_REQUEST['position'];
//   $mobile=$_REQUEST['user_mob'];
//   $password=$_REQUEST['password'];
//   if(check_pin($pin)){
//     insert_into_users($s_id,$name,$pos,$mobile,$password);
//   }
//   header("Location:../registration.php");
// }

if(isset($_GET['st'])){
  if($_GET['st'] == 1){
  $uss = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
  $prc = mysqli_real_escape_string($conn, $_REQUEST['prc']);
  $dataaa=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$uss'"));
  $s_id = $dataaa['sponsor_id'];
  level_distribution($s_id, $prc);
  header('Location: ../orders.php');
  
  }elseif($_GET['st'] == 2){
      
  $uss = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
  $prc = mysqli_real_escape_string($conn, $_REQUEST['prc']);
  $dataaa=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$uss'"));
  $s_id = $dataaa['sponsor_id'];
  level_distributionl($s_id, $prc);
  header('Location: ../');
  }
  
}
function binary_count($spons,$pos){
  global $conn;
  if ($pos==0) {
    $pos="left_count";
  } else {
    $pos="right_count";
  }
  $spons=find_placement_id($spons);
  while ($spons!=0) {
    mysqli_query($conn,"UPDATE `users` SET `$pos`=`$pos`+1 WHERE `user_id`='$spons'");
    is_pair_generate($spons,$pos);
    $pos=find_position($spons);
    $spons=find_placement_id($spons);
  }
}

function is_pair_generate($spons,$pos){
  global $conn;
  $compare_pos=($pos=="left_count")?"right_count":"left_count";
  $pla_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spons'"));
  if ($pla_data[$pos]<=$pla_data[$compare_pos]) {
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

function insert_into_users($user_id,$email,$s_id,$name,$pos,$mobile,$password,$gender){
  global $conn;
  $date = date("Y-m-d");
  mysqli_query($conn,"INSERT INTO `users`(`user_id`, `email`, `name`, `password`, `mobile`, `gender`, `position`, `sponsor_id`, `registration_date`, `status`) VALUES ('$user_id','$email','$name','$password','$mobile', '$gender','$pos',$s_id, '$date', '2')");
  mysqli_query($conn,"INSERT INTO `wallet`(`user_id`, `amount`, `date`, `status`) VALUES ('$user_id','0','$date', '0')");
  placement_id($user_id,$s_id,$pos);
  mailing($email,$name,$user_id);
}

function placement_id($user_id,$s_id,$pos){
  global $conn;
  $spons_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
  if ($pos==0) {
    if ($spons_data['left_side']==0) {
      mysqli_query($conn,"UPDATE `users` SET `left_side`='$user_id' WHERE `user_id`='$s_id'");
      mysqli_query($conn,"UPDATE `users` SET `placement_id`='$s_id'  WHERE `user_id`='$user_id'");
      binary_count($user_id,$pos);
    } else {
      placement_id($user_id,$spons_data['left_side'],$pos);
    }
  } else {
    if ($spons_data['right_side']==0) {
      mysqli_query($conn,"UPDATE `users` SET `right_side`='$user_id' WHERE `user_id`='$s_id'");
      mysqli_query($conn,"UPDATE `users` SET `placement_id`='$s_id'  WHERE `user_id`='$user_id'");
      binary_count($user_id,$pos);
    } else {
      placement_id($user_id,$spons_data['right_side'],$pos);
    }
  }
}

function level_distribution($s_id, $prc){
  global $conn;
  $date = date("Y-m-d H:i:s");
  $dateaa = date("Y-m-d");
  $a=0;
  $first = ($prc/100) * 20;
  $secnd = ($prc/100) * 10;
  $thrd = ($prc/100) * 5;
  $frth = ($prc/100) * 5;
  $fivth = ($prc/100) * 5;
  $income=[$first,$secnd,$thrd,$frth,$fivth];
  while ($a < 5 && $s_id!=0) {
    // mysqli_query($conn,"UPDATE `wallet` SET `amount`=`amount`+$income[$a] WHERE `user_id`='$s_id'");
    mysqli_query($conn, "INSERT INTO wallet (user_id, amount, date, status) VALUES ('$s_id', '$income[$a]', '$dateaa', '0')");
    mysqli_query($conn,"INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `datee`, `cr_dr`) VALUES ('$s_id','$income[$a]','Affiliate Commission', '$date', '0')");
    $next_id=find_sponsor_id($s_id);
    $s_id=$next_id;
    $a++;
  }

}

function level_distributionl($s_id, $prc){
  global $conn;
  $date = date("Y-m-d H:i:s");
  $dateaa = date("Y-m-d");
  $a=0;
  $income=[400,300,100,100,100,100,100,100,100,100];
  while ($a < 10 && $s_id!=0) {
    // mysqli_query($conn,"UPDATE `wallet` SET `amount`=`amount`+$income[$a] WHERE `user_id`='$s_id'");
    mysqli_query($conn, "INSERT INTO wallet (user_id, amount, date, status) VALUES ('$s_id', '$income[$a]', '$dateaa', '0')");
    mysqli_query($conn,"INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `datee`, `cr_dr`) VALUES ('$s_id','$income[$a]','Level Income', '$date', '0')");
    $next_id=find_sponsor_id($s_id);
    $s_id=$next_id;
    $a++;
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

  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id' AND `password`='$pass'");
  $dat = mysqli_fetch_array($query);
  if (mysqli_num_rows($query)==1) {
    if($dat['status']==0){
    $_SESSION['session_id']=session_id();
    $_SESSION['user_id']=$user_id;
    $_SESSION['user_status'] = $dat['user_status'];
    $_SESSION['user_gd'] = $dat['gender'];
    header("Location:../");
    }elseif($dat['status']==1){
        header("Location:../login.php?m=2");
    }else{
        header("Location:../login.php?m=3");
    }
  } else {
    header("Location:../login.php?m=1");
  }
}

function mailing($email,$name,$userid){
    ini_set("SMTP", "mail.piiwell.com");
    ini_set("sendmail_from", "no-reply@piiwell.com");


  $receiving_email_address = $email;
  $from_email = "no-reply@piiwell.com";
  $full_name = "PiiWell";
  $from_mail = $full_name.'<'.$from_email.'>';
  $subject = "Verify Email - PiiWell";
  $txt = "Hi,".$name."\r\n\r\n Please Verify Your Email. Email Verification Link Is Given Below. Simply Click  On This Link And Verify Your Email. \r\n\r\n\r\n  https://piiwell.com/verify_email.php?verify_email=" . base64_encode($email). "&verify=".base64_encode($userid)."\r\n\r\n\r\n Thanks & Regards, \r\n PiiWell";
  $headers = "From: ".$from_mail. "\r\n";
  mail($receiving_email_address,$subject,$txt,$headers);

  }

 ?>
