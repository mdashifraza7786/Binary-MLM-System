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
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Income</title>
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
                                    $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$my_id'"));
                                  ?>
                                    <h5 class="text-muted">Total Income</h5>
                                    <h2 class="mb-0"><?php echo $user_data['wallet'] ?></h2>
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
                                    <h5 class="text-muted">Total Direct</h5>
                                    <h2 class="mb-0"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `sponsor_id`='$my_id'")) ?></h2>
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
                                    <h5 class="text-muted">Downline</h5>
                                    <h2 class="mb-0"><?php echo $user_data['left_count']+$user_data['right_count'] ?></h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                    <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                      <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Basic Table</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Amount</th>
                                                    <th>Description</th>
                                                    <th>credit/debit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  $a=0;
                                                  $income_h_query=mysqli_query($conn,"SELECT * FROM `income_history` WHERE `user_id`='$my_id'");
                                                  while ($data=mysqli_fetch_array($income_h_query)) {
                                                    ?>
                                                      <tr>
                                                        <td><?php echo ++$a ?></td>
                                                        <td><?php echo $data['amt']; ?></td>
                                                        <td><?php echo $data['desp'] ?></td>
                                                        <td><?php
                                                          if (!$data['cr_dr']) {
                                                            echo "Credit";
                                                          } else {
                                                            echo "Debit";
                                                          }
                                                         ?></td>
                                                      </tr>
                                                    <?php
                                                  }
                                                 ?>
                                            </tbody>
                                        </table>
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
