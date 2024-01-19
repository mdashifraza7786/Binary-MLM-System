<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
        <!-- sidebar -->
        <?php include 'element/sidebar.php'; ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="row">
                         <?php
                         if(isset($_POST['idcard_id'])){
                            if($_POST['idcard_id'] === "1"){
                            mysqli_query($conn,"UPDATE `users` SET `id_card`='1' WHERE `user_id`='$my_id'");
                            }
                            if($_POST['idcard_id'] === "0"){
                                mysqli_query($conn,"UPDATE `users` SET `id_card`='0' WHERE `user_id`='$my_id'");
                                }
                          }
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
                               <?php
                               if($details['id_card'] === "0"){
                               ?>
                               <br><br>
                               <form action="" method="POST">
                                <input type="hidden" name="idcard_id" value="1">
                               <button class="btn btn-primary" >Request To Generate ID Card</button>
                               </form>
                               <?php
                               }elseif($details['id_card'] === "1"){?>
                               <br><br>
                               <button class="btn btn-success" disabled>Already Requested To Generate ID Card</button><br>
                               <br><br>
                               <form action="" method="POST">
                                <input type="hidden" name="idcard_id" value="0">
                               <button class="btn btn-danger" >Cancell Request</button>
                               </form>
                               <?php
                               }else{?>
                               <br><br>
                                    <img src="admin/<?php echo $details['id_img']; ?>" alt="" style="width:100%;" class="id_card_img">
                                    <form action="" method="POST">
                                    <input type="hidden" name="idcard_id" value="0">
                                    <br>
                                    <button class="btn btn-danger" >Destroy ID Card</button>
                                    </form>
                               <?php }
                               ?>
                           </div>

                           <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">

                               <div class="influence-profile-content pills-regular">
                                   
                                   <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                           <div class="card">
                                             <h5 class="card-header">Basic Details</h5>

                                             <div class="card-body">
                                               <form method="POST" action="element/redirect.php">

                                               <div class="row">
                                                   <div class="form-group col-md-3">
                                                     <label>ID</label>
                                                     <input type="text" class="form-control" name="my_user_id" value="<?php echo $my_id ?>" readonly>
                                                   </div>
                                                   <div class="form-group col-md-3">
                                                     <label>Sponsor ID</label>
                                                     <input type="text" class="form-control" name="sponsor_id" value="<?php echo $details['sponsor_id'] ?>" disabled>
                                                   </div>
                                                   <div class="form-group col-md-6">
                                                     <label>Email</label>
                                                     <input type="text" class="form-control" name="user_mail" value="<?php echo $details['email'] ?>" disabled>
                                                   </div>
                                                   
                                                 </div>
                                                 <br>
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
                                                 </div><br>

                                                 <div class="row">
                                                   <div class="form-group col-md-12">
                                                     <label>Address</label>
                                                     <textarea name="address" rows="3" cols="80" class="form-control"  required><?php echo $details['address'] ?></textarea>
                                                   </div>
                                                   <br><br>
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

                                   </div>
                               </div>
            </div>

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
</body>
</html>