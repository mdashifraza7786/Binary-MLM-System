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
    <title>Register</title>
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

                          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                              <div class="card">
                                  <h5 class="card-header">New Registration Form</h5>

                                  <div class="card-body">
                                      <form method="POST" action="element/redirect.php">
                                        <div class="form-group">
                                            <label for="inputUserName">Sponsor ID</label>
                                            <input id="inputUserName" name="sponsor_id" type="text" value="<?php echo $my_id ?>" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUserName">PIN</label>
                                            <input id="inputUserName" name="pin" type="text" class="form-control" >
                                        </div>
                                          <div class="form-group">
                                              <label for="inputUserName">Name</label>
                                              <input id="inputUserName" type="text" name="user_name" required="" placeholder="Enter user name" class="form-control" oninput="this.value = this.value.toUpperCase()" pattern="[a-zA-Z\s]+">
                                          </div>
                                          <div class=" form-group btn-group btn-group-toggle" data-toggle="buttons">
                                              <label class="btn btn-primary active">
                                                  <input type="radio" name="position" id="option1" value="0" checked>Left
                                              </label>
                                              <label class="btn btn-primary">
                                                  <input type="radio" name="position" id="option2" value="1" > Right
                                              </label>
                                          </div>
                                          <div class="form-group">
                                              <label for="inputPassword">Mobile No</label>
                                              <input id="inputPassword" type="tel" name="user_mob" placeholder="mobile no" required="" class="form-control" pattern="[0-9]{10}">
                                          </div>
                                          <div class="form-group">
                                              <label for="inputRepeatPassword">Password</label>
                                              <input id="inputRepeatPassword" name="password" data-parsley-equalto="#inputPassword" type="text" required="" placeholder="Password" class="form-control" pattern="[a-zA-Z0-9@]{6,20}">
                                              <p><small>Password length should not less than 6 digit (only Numbers, Alphabet and @ is allowed)</small> </p>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-6">

                                                   <button type="submit" name="user_registration" class="btn btn-space btn-primary">Submit</button>


                                              </div>
                                          </div>
                                      </form>
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
