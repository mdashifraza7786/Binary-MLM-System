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
    <title>Refferal Link</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

	    <?php
      include_once("element/sidebar.php");
       ?>

	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">



          <div class="row">

                      <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <h5 class="card-header"> Sales By Social Source</h5>
                            <div class="card-body p-0">
                                <ul class="social-sales list-group list-group-flush">
                                    <li class="list-group-item social-sales-content">
                                      <span class="social-sales-icon-circle facebook-bgcolor mr-2">
                                        <i class="fab fa-facebook-f"></i></span>
                                        <span class="social-sales-name">Facebook</span>
                                        <span class="social-sales-count text-dark"> <a href="https://www.facebook.com/sharer/sharer.php?u=google.co.in" target="_blank">Share</a> </span>
                                      </li>
                                    <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle twitter-bgcolor mr-2"><i class="fab fa-whatsapp"></i></span><span class="social-sales-name">Whatsapp</span><span class="social-sales-count text-dark">99 Sales</span></li>
                                    <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle instagram-bgcolor mr-2"><i class="fab fa-instagram"></i></span><span class="social-sales-name">Instagram</span><span class="social-sales-count text-dark">76 Sales</span></li>
                                    <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle pinterest-bgcolor mr-2"><i class="fab fa-pinterest-p"></i></span><span class="social-sales-name">Pinterest</span><span class="social-sales-count text-dark">56 Sales</span></li>
                                    <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle googleplus-bgcolor mr-2"><i class="fab fa-google-plus-g"></i></span><span class="social-sales-name">Google Plus</span><span class="social-sales-count text-dark">36 Sales</span></li>
                                </ul>
                            </div>
                        </div>
                      </div>

         </div>


      </div>
    </div>
  </div>

	                    <!-- ============================================================== -->
	                    <!-- end widgets   -->
	                    <!-- ============================================================== -->
	                    <!-- ============================================================== -->
	                    <!-- end main wrapper  -->
	                    <!-- ============================================================== -->
	                    <!-- Optional JavaScript -->
	                    <!-- jquery 3.3.1 -->
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
