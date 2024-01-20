<!doctype html>
<html lang="en">
<head>
  <?php
    include_once("element/connection.php");
   ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pins</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php
        include_once("element/sidebar.php");
         ?>

        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">

                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                      <div class="card">
                          <h5 class="card-header">Pin Transfer</h5>

                                  <div class="card-body">
                                      <form method="post" action="element/redirect.php" id="basicform" data-parsley-validate="">
                                          <div class="form-group">
                                              <label for="inputPassword">ID</label>
                                              <input id="inputPassword" type="tel" required="" class="form-control" value="" name="id">
                                          </div>
                                          <div class="form-group">
                                              <label for="inputRepeatPassword">Pin count</small> </label>
                                              <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" name="pin_count" type="text" placeholder="Enter Pin" class="form-control" oninput="this.value = this.value.toUpperCase()" required >
                                              <p><small>Pin must be 10 digit alphanumeric </small> </p>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-6">
                                                  <button type="submit" name="pin_transfer" class="btn btn-space btn-primary">Submit</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>

                      </div>
                    </div>


                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Pin Transfer History</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Agent id</th>
                                                <th>Pin Count</th>
                                                <th>Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $query=mysqli_query($conn,"SELECT * FROM `pin_transfer_history`");
                                            while ($pi_t_h=mysqli_fetch_array($query)) {
                                              ?>
                                              <tr>
                                                <th><?php echo $pi_t_h['agent_id'] ?></th>
                                                <th><?php echo $pi_t_h['pin_count'] ?></th>
                                                <th><?php echo $pi_t_h['time'] ?></th>
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

            </div>


        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

</body>

</html>
