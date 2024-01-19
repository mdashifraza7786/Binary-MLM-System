<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Change Password</title>
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
            <div class="tab-pane">
                                             <div class="card">
                                                 <h5 class="card-header">Password</h5>
                                                 <div class="card-body">
                                                 <?php 
                                                   if(isset($_GET['m'])){
                                                   if($_GET['m'] == 1){ ?> 
                                                       <p class="text-success">Password Changed Successfully.</p>
                                                   <?php }elseif($_GET['m'] == 2){
                                                       echo '<p class="text-danger">New Password & Confirm Password Did Not Matched</p>';
                                                   }
                                                   }
                                                   ?>
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

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
</body>
</html>