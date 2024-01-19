
<!doctype html>
<html lang="en">
<head>
  <?php
    include_once("element/connection.php");
   ?>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php
        include_once("element/sidebar.php");
         ?>

         <div class="dashboard-wrapper">
               <div class="influence-profile">
                   <div class="container-fluid dashboard-content ">

                       <div class="row">
                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="page-header">
                                   <h3 class="mb-2">Profile </h3>
                                   <p class="pageheader-text"></p>
                                   <div class="page-breadcrumb">
                                       <nav aria-label="breadcrumb">
                                           <ol class="breadcrumb">
                                               <li class="breadcrumb-item"><a target="_self" href="#" class="breadcrumb-link">Dashboard</a></li>
                                               <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                           </ol>
                                       </nav>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="row">
                         <?php
                          $my_id=$_REQUEST['myid'];
                          $details=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$my_id'"));
                          ?>
                           <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">

                               <div class="card">
                                   <div class="card-body">
                                       <div class="user-avatar text-center d-block">

                                       </div>
                                       <div class="text-center">
                                           <h2 class="font-24 mb-0"><?php echo $my_id ?></h2>
                                           <p><?php echo $details['name'] ?></p>
                                       </div>
                                   </div>
                               </div>

                           </div>

                           <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">

                               <div class="influence-profile-content pills-regular">
                                   <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                       <li class="nav-item">
                                           <a target="_self" class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#basic" role="tab" aria-controls="pills-campaign" aria-selected="true">Personal</a>
                                       </li>
                                       <li class="nav-item">
                                           <a target="_self" class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#bank" role="tab" aria-controls="pills-packages" aria-selected="false">Banking</a>
                                       </li>
                                       <!--li class="nav-item">
                                           <a target="_self" class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Reviews</a>
                                       </li-->
                                       <li class="nav-item">
                                           <a target="_self" class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#password" role="tab" aria-controls="pills-msg" aria-selected="false">Password</a>
                                       </li>
                                   </ul>


                             <div class="tab-content" id="pills-tabContent">

                                   <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                           <div class="card">
                                             <h5 class="card-header">Basic Details</h5>

                                             <div class="card-body">
                                               <form method="POST" action="element/redirect.php">

                                               <div class="row">
                                                   <div class="form-group col-md-6">
                                                     <label>ID</label>
                                                     <input type="text" class="form-control" name="my_user_id" value="<?php echo $my_id ?>" readonly>
                                                   </div>
                                                   <div class="form-group col-md-3">
                                                     <label>Sponsor ID</label>
                                                     <input type="text" class="form-control" name="sponsor_id" value="<?php echo $details['sponsor_id'] ?>" disabled>
                                                   </div>
                                                   <div class="form-group col-md-3">
                                                     <label>status</label>

                                                       <select class="form-control" name="status" required>
                                                         <option value="1" <?php echo ($details['status']==1)?"selected":"" ?>>Block</option>
                                                         <option value="0" <?php echo ($details['status']==0)?"selected":"" ?>>Unblock</option>
                                                       </select>

                                                   </div>
                                                 </div>

                                                 <div class="row">
                                                   <div class="form-group col-md-6">
                                                     <label>Name</label>
                                                     <input type="text" name="agent_name" class="form-control" value="<?php echo $details['name'] ?>" readonly>
                                                   </div>
                                                     <div class="form-group col-md-3">
                                                       <label>DOB</label>
                                                       <input type="date" class="form-control" name="dob" value="<?php echo $details['dob'] ?>" required>
                                                     </div>
                                                     <div class="form-group col-md-3">
                                                       <label>Gender</label>

                                                         <select class="form-control" name="gender" required>
                                                           <option value="1" <?php echo ($details['gender']==1)?"selected":"" ?>>Male</option>
                                                           <option value="0" <?php echo ($details['gender']==0)?"selected":"" ?>>Female</option>
                                                         </select>

                                                     </div>
                                                 </div>

                                                 <div class="row">
                                                   <div class="form-group col-md-12">
                                                     <label>Address</label>
                                                     <textarea name="address" rows="3" cols="80" class="form-control"  required><?php echo $details['address'] ?></textarea>
                                                   </div>
                                                   <div class="form-group col-md-4">
                                                     <label>PAN No.</label>
                                                     <input type="text" class="form-control" name="pan_no" value="<?php echo $details['panno'] ?>" oninput="this.value = this.value.toUpperCase()" pattern="([A-Z]){5}([0-9]){4}([A-Z]){1}" required>
                                                   </div>
                                                   <div class="form-group col-md-4">
                                                     <label>Aadhar No.</label>
                                                     <input type="text" class="form-control" name="aadhar_no" value="<?php echo $details['aadharno'] ?>" pattern="[0-9]{12}" required>
                                                   </div>

                                                   <div class="form-group col-md-4">
                                                     <label>Mobile No.</label>
                                                     <input type="number" class="form-control" name="mob" value="<?php echo $details['mobile'] ?>" required>
                                                   </div>
                                                 </div>
                                               <button type="submit" name="profile_update_basic" class="btn btn-primary" >Submit</button>
                                             </form>
                                             </div>
                                           </div>
                                   </div>

                                         <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="pills-packages-tab">
                                           <div class="card">
                                               <h5 class="card-header">Bank Details</h5>
                                               <div class="card-body">
                                                   <form method="post" action="#">
                                                       <div class="row">
                                                           <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                               <div class="form-group">
                                                                   <label for="name">Bank Name</label>
                                                                   <input type="text" class="form-control form-control" name="bank_name" value="" oninput="this.value = this.value.toUpperCase()" placeholder="" required pattern="[a-zA-Z\s]{1,25}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="email">Account Holder Name</label>
                                                                   <input type="text" class="form-control form-control" name="bank_holder_name" value="" oninput="this.value = this.value.toUpperCase()" placeholder="" pattern="[a-zA-Z\s]{1,40}" required>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="email">Account No.</label>
                                                                   <input type="text" class="form-control form-control" name="bank_acc_no" value="" placeholder="" pattern="[0-9]{9,18}" required>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="name">IFSC</label>
                                                                   <input type="text" class="form-control form-control" name="bank_ifsc" value="" placeholder="" oninput="this.value = this.value.toUpperCase()" required pattern="[A-Za-z]{4}0[A-Z0-9a-z]{6}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="name">Branch</label>
                                                                   <input type="text" class="form-control form-control" name="bank_branch" value="" placeholder="" oninput="this.value = this.value.toUpperCase()" required pattern="[A-Z\s]{3,30}">
                                                               </div>
                                                               <button type="submit" name="profile_update_banking" class="btn btn-primary float-center">Submit</button>
                                                           </div>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                         </div>

                                         <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="pills-msg-tab">
                                             <div class="card">
                                                 <h5 class="card-header">Password</h5>
                                                 <div class="card-body">
                                                     <form method="post" action="element/redirect.php">
                                                         <div class="row">
                                                             <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                                 <div class="form-group">
                                                                     <label for="name">New Password</label>
                                                                     <input type="text" class="form-control form-control-lg" name="password" placeholder="" required pattern="[a-zA-Z0-9@]{6,20}">
                                                                     <input type="hidden" class="form-control" name="my_user_id" value="<?php echo $my_id ?>" readonly>
                                                                 </div>
                                                                 <div class="form-group">
                                                                     <label for="email">Confirm Password</label>
                                                                     <input type="password" class="form-control form-control-lg" name="confirm_password" placeholder="" pattern="[a-zA-Z0-9@]{6,20}" required>
                                                                     <p><small>Password length should not less than 6 digit (only Numbers, Alphabet and @ is allowed)</small> </p>
                                                                 </div>
                                                                 <button type="submit" name="profile_update_password" class="btn btn-primary float-center">Change Password</button>
                                                             </div>
                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>

                                   </div>
                               </div>

                           </div>

                       </div>
                   </div>
               </div>

           </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>

</body>

</html>
