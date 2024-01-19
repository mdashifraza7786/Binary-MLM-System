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
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>

    <div class="dashboard-main-wrapper">

	    <?php
      include_once("element/sidebar.php");
       ?>

	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">
                <?php
                if (isset($_REQUEST['user_id'])) {
                  $level_sponsor=$_REQUEST['user_id'];
                  if (check_my_downline($level_sponsor,$my_id)) {
                    // code...
                  }else {
                    $level_sponsor=$my_id;
                  }
                } else {
                  $level_sponsor=$my_id;
                }

                 ?>
                  <div class="row">
                            <div class="col-md-12">


                                                 <div class="main-card mb-3 card">
                                                     <div class="card-header"></div>
                                                     <div class="table-responsive">
                                                         <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                            <thead>
                                                             <tr>
                                                                 <th class="text-center">#</th>
                                                                 <th class="text-center">Name</th>
                                                                 <th class="text-center">Mobile</th>
                                                                 <th></th>
                                                             </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php
                                                                $data=mysqli_query($conn,"SELECT * FROM `users` WHERE `sponsor_id`='$level_sponsor'");
                                                                  $a=1;
                                                                  if (mysqli_num_rows($data)>0) {
                                                                    while ($user_detail=mysqli_fetch_array($data)) {
                                                                      ?><tr><td class="text-center text-muted"><?php echo $a; ?></td>
                                                                      <td class="text-center">
                                                                          <div class="widget-content p-0">
                                                                              <div class="widget-content-wrapper">
                                                                                  <div class="widget-content-left flex2">
                                                                                      <div class="widget-heading">
                                                                                        <?php echo $user_detail['name'] ?>
                                                                                      </div>
                                                                                      <div class="widget-subheading opacity-7"><?php echo $user_detail['user_id'] ?></div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </td>
                                                                      <td class="text-center"><?php echo $user_detail['mobile'] ?></td>
                                                                      <td class="text-center"> <a href="level.php?user_id=<?php echo $user_detail['user_id'] ?>">Downline</a> </td>
                                                                      </tr><?php
                                                                      ++$a;
                                                                    }
                                                                  } else {
                                                                    ?> <tr>
                                                                      <td colspan="4" class="text-center"> Data Not Available</td>
                                                                    </tr> <?php
                                                                  }
                                                                ?>


                                                            </tbody>
                                                           </table>
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

                      <?php
                        function check_my_downline($user_id,$login_id){
                          global $conn;
                          $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id'"));
                          $spons_id=$data['sponsor_id'];
                          while ($spons_id!=0) {
                            if ($spons_id==$login_id) {
                              return true;
                            } else {
                              $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spons_id'"));
                              $spons_id=$data['sponsor_id'];
                            }
                          }
                          if ($spons_id==0) {
                            return false;
                          }
                        }
                       ?>
</body>

</html>
