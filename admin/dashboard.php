<!doctype html>
<html lang="en">
<?php
  include_once("element/connection.php");
 ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="dashboard-main-wrapper">

	    <?php
      include_once("element/sidebar.php");
      $query1 = "SELECT 
            COUNT(user_id) AS total_user,
            COUNT(CASE WHEN user_status = '1' THEN user_id END) AS active_users,
            COUNT(CASE WHEN user_status = '0' THEN user_id END) AS inactive_user
          FROM `users`";
       $userData=mysqli_fetch_array(mysqli_query($conn,$query1));
       
       $query2 = "SELECT 
            SUM(no_of_pair) AS total_pair,
            SUM(CASE WHEN status = '1' THEN no_of_pair ELSE 0 END) AS total_paid_pair,
            SUM(CASE WHEN status = '0' THEN no_of_pair ELSE 0 END) AS total_balance_pair
          FROM `pair_count`";

        $pairData = mysqli_fetch_array(mysqli_query($conn, $query2));

        $query3 = "SELECT 
            COUNT(pin_value) AS total_pin,
            SUM(CASE WHEN status = '0' THEN 1 ELSE 0 END) AS total_unused_pin,
            SUM(CASE WHEN status = '1' THEN 1 ELSE 0 END) AS total_used_pin
          FROM `pin`";

        $pinData = mysqli_fetch_array(mysqli_query($conn, $query3));
        
        $query4 = "SELECT 
            SUM(CASE WHEN status = '1' THEN amt ELSE 0 END) AS total_transfer_amt,
            SUM(CASE WHEN status = '0' THEN amt ELSE 0 END) AS total_pending_amt
          FROM `witdrawl`";

        $withdrawalData = mysqli_fetch_array(mysqli_query($conn, $query4));

       ?>

	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">

                <div class="row">

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total User</h5>
                                    <h2 class="mb-0"><?php if($userData['total_user'] > 0){echo  $userData['total_user'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                    <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Active Users</h5>
                                    <h2 class="mb-0"><?php if($userData['active_users'] > 0){ echo  $userData['active_users'];}else{ echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                    <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Inactive User</h5>
                                    <h2 class="mb-0"><?php if($userData['inactive_user'] > 0){echo  $userData['inactive_user'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                    <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Pair</h5>
                                    <h2 class="mb-0"><?php if($pairData['total_pair'] > 0){echo $pairData['total_pair'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Paid Pair</h5>
                                    
                                    <h2 class="mb-0"><?php if($pairData['total_paid_pair'] > 0){echo $pairData['total_paid_pair'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Balance Pair</h5>
                                    <h2 class="mb-0"><?php if($pairData['total_balance_pair'] > 0){echo $pairData['total_balance_pair'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Pins</h5>

                                    <h2 class="mb-0"><?php if($pinData['total_pin'] > 0){echo $pinData['total_pin'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Unused Pins</h5>
                                    <h2 class="mb-0"><?php if($pinData['total_unused_pin'] > 0){echo $pinData['total_unused_pin'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total used Pins</h5>
                                    <h2 class="mb-0"><?php if($pinData['total_used_pin'] > 0){echo $pinData['total_used_pin'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Transfer amt</h5>
                                    <h2 class="mb-0"><?php if( $withdrawalData['total_transfer_amt'] > 0){echo $withdrawalData['total_transfer_amt'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Pending amt</h5>
                                    <h2 class="mb-0"><?php if($withdrawalData['total_pending_amt'] > 0){echo $withdrawalData['total_pending_amt'];}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Pending ID Cards</h5>
                                    <?php
                                      $user_data=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `id_card`='1'"));
                                      
                                     ?>
                                    <h2 class="mb-0"><?php if($user_data > 0){echo $user_data;}else{echo 0;} ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
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
	                    <!-- morris-chart js -->
	                    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
	                    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
	                    <script src="assets/vendor/charts/morris-bundle/morrisjs.html"></script>
	                    <!-- chart js -->
	                    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
	                    <script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
	                    <!-- dashboard js -->
	                    <script src="assets/libs/js/dashboard-influencer.js"></script>
</body>

</html>
