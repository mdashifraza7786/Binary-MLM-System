<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Bank Details </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
        <!-- sidebar -->
        <?php include 'element/sidebar.php'; 
        $bank_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE user_id='$my_id'"));
        if(isset($_POST['profile_update_banking'])){
            $bank_name = $_POST['bank_name'];
            $bank_holder_name = $_POST['bank_holder_name'];
            $bank_acc_no = $_POST['bank_acc_no'];
            $bank_ifsc = $_POST['bank_ifsc'];
            $bank_branch = $_POST['bank_branch'];
            $urr = "UPDATE `users` SET `bank_name`='$bank_name', `account_holder`='$bank_holder_name', `account_no`='$bank_acc_no', `ifsc`='$bank_ifsc', `branch`='$bank_branch' WHERE `user_id`='$my_id'";
            $upd = mysqli_query($conn,"UPDATE `users` SET `bank_name`='$bank_name', `account_holder`='$bank_holder_name', `account_no`='$bank_acc_no', `ifsc`='$bank_ifsc', `branch`='$bank_branch' WHERE `user_id`='$my_id'");
            if($conn->query($urr) === TRUE){
              $updated = "";
            }
          }
        ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
            <div class="tab-pane " id="bank" role="tabpanel aria-labelledby="pills-packages-tab">
                                           <div class="card">
                                               <h5 class="card-header">Bank Details</h5>
                                               <div class="card-body">
                                                   <?php 
                                                   if(isset($_GET['m'])){
                                                   if($_GET['m'] == 1){ ?> 
                                                       <p class="text-success">Banks Details Updated Successfully.</p>
                                                   <?php }
                                                   }
                                                   ?>
                                               
                                                   <form method="post" action="">
                                                       <div class="row">
                                                           <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                               <div class="form-group">
                                                                   <label for="name">Bank Name</label>
                                                                   <input type="text" class="form-control form-control" value="<?php echo $bank_data['bank_name']; ?>" name="bank_name" oninput="this.value = this.value.toUpperCase()" placeholder="" required pattern="[a-zA-Z\s]{1,25}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="email">Account Holder Name</label>
                                                                   <input type="text" class="form-control form-control" value="<?php echo $bank_data['account_holder']; ?>" name="bank_holder_name" oninput="this.value = this.value.toUpperCase()" placeholder="" pattern="[a-zA-Z\s]{1,40}" required>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="email">Account No.</label>
                                                                   <input type="text" class="form-control form-control" value="<?php echo $bank_data['account_no']; ?>" name="bank_acc_no"  placeholder="" pattern="[0-9]{9,18}" required>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="name">IFSC</label>
                                                                   <input type="text" class="form-control form-control" value="<?php echo $bank_data['ifsc']; ?>" name="bank_ifsc" placeholder="" oninput="this.value = this.value.toUpperCase()" required pattern="[A-Za-z]{4}0[A-Z0-9a-z]{6}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="name">Branch</label>
                                                                   <input type="text" class="form-control form-control" value="<?php echo $bank_data['branch']; ?>" name="bank_branch" placeholder="" oninput="this.value = this.value.toUpperCase()" required pattern="[A-Z\s]{3,30}">
                                                               </div>
                                                               <br>
                                                               <button type="submit" name="profile_update_banking" class="btn btn-primary float-center">Submit</button>
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