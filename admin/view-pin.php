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
    <title>View Pins</title>
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Agent Pin</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Agent ID & Name</th>
                                                    <th>Pin Available</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  $a=0;
                                                  $income_h_query=mysqli_query($conn,"SELECT * FROM `users`");
                                                  while ($data=mysqli_fetch_array($income_h_query)) {
                                                    $id=$data['user_id'];
                                                    ?>
                                                      <tr>
                                                        <td><?php echo ++$a ?></td>
                                                        <td><?php echo $id."</br>".$data['name']; ?></td>
                                                        <td><?php echo check_availble_pin($id) ?></td>
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
<?php
function check_availble_pin($agent_id){
  global $conn;
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT count(allcote_user) total FROM `pin` WHERE `allcote_user`='$agent_id' AND `status`!='1'"));
  return $data['total'];
}
 ?>
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
