<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
<?php
  include_once("element/connection.php");
  if(isset($_REQUEST['checkout_'])){
    $_SESSION['checkouted'] = $_REQUEST['checkout_'];
  }


if (isset($_REQUEST['agent_id'])) {
  $agent_id=$_REQUEST['agent_id'];
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$agent_id'"));
  $wallet_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `wallet` WHERE `user_id`='$agent_id'"));
  // left count condition
  if($data['left_side'] != ""){
    $user_id = $data['left_side'];
    $data_name = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id'"));
    $left =  $data_name['name'].  " ( ".$data['left_side']." )";
    $left = '<a href="tree.php?userid='.$data['left_side'].'">'.$left.'</a>';
  }else{
    $left =  "<a href='registration.php?side=left&user_id=".$agent_id."'><button class='btn btn-primary'>Add member in left</button></a>";
  }

  // right count condition
  if($data['right_side'] != ""){
    $user_id = $data['right_side'];
    $data_name = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id'"));
    $right =  $data_name['name'].  " ( ".$data['right_side']." )";
    $right = '<a href="tree.php?userid='.$data['right_side'].'">'.$right.'</a>';
  }else{
    $right =  "<a href='registration.php?side=right&user_id=".$agent_id."'><button class='btn btn-primary'>Add member in right</button></a>";
  }
  echo '<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col" colspan="2">Name : '.$data['name'].'</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Income After Payout</th>
        <td>₹'.$wallet_data['amount'].'</td>
      </tr>
      <br>
      <tr>
        <th scope="row">Left Count</th>
        <td>'.$data['left_count'].'</td>
      </tr>
      <tr>
        <th scope="row">Right Count</th>
        <td>'.$data['right_count'].'</td>
      </tr>
      <tr>
        <th scope="row">Left User</th>
        <td>'.$left.'</td>
      </tr>
      <tr>
        <th scope="row">Right User</th>
        <td>'.$right.'</td>        
      </tr>
    </tbody>
  </table>';
}
 ?>
