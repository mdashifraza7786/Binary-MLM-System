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
       ?>

	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">

                <div class="row">

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                  <?php
                                    $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) total_user FROM `users`"));
                                  ?>
                                    <h5 class="text-muted">Total User</h5>
                                    <h2 class="mb-0"><?php echo $user_data['total_user'] ?></h2>
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
                                  <?php
                                    $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) total_user FROM `users` WHERE `status`='0'"));
                                  ?>
                                    <h5 class="text-muted">Active Users</h5>
                                    <h2 class="mb-0"><?php echo $user_data['total_user'] ?></h2>
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
                                  <?php
                                    $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) total_user FROM `users` WHERE `status`='1'"));
                                  ?>
                                    <h5 class="text-muted">Blocked User</h5>
                                    <h2 class="mb-0"><?php echo $user_data['total_user'] ?></h2>
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
                                    <?php
                                      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(no_of_pair) total_pair FROM `pair_count`"));
                                     ?>
                                    <h2 class="mb-0"><?php echo $user_data['total_pair'] ?></h2>
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
                                    <?php
                                      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(no_of_pair) total_pair FROM `pair_count` WHERE `status`='1'"));
                                     ?>
                                    <h2 class="mb-0"><?php echo $user_data['total_pair'] ?></h2>
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
                                    <?php
                                      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(no_of_pair) total_pair FROM `pair_count` WHERE `status`='0'"));
                                     ?>
                                    <h2 class="mb-0"><?php echo $user_data['total_pair'] ?></h2>
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
                                    <?php
                                      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT count(pin_value) total_pin FROM `pin`"));
                                     ?>
                                    <h2 class="mb-0"><?php echo $user_data['total_pin'] ?></h2>
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
                                    <?php
                                      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT count(pin_value) total_pin FROM `pin` WHERE `status`='0'"));
                                     ?>
                                    <h2 class="mb-0"><?php echo $user_data['total_pin'] ?></h2>
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
                                    <?php
                                      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT count(pin_value) total_pin FROM `pin` WHERE `status`='1'"));
                                     ?>
                                    <h2 class="mb-0"><?php echo $user_data['total_pin'] ?></h2>
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
                                    <?php
                                      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(amt) total_amt FROM `witdrawl` WHERE `status`='1'"));
                                     ?>
                                    <h2 class="mb-0"><?php echo $user_data['total_amt'] ?></h2>
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
                                    <?php
                                      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(amt) total_amt FROM `witdrawl` WHERE `status`='0'"));
                                      
                                     ?>
                                    <h2 class="mb-0"><?php echo $user_data['total_amt'] ?></h2>
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
                                    <h2 class="mb-0"><?php echo $user_data; ?></h2>
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
