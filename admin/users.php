<!doctype html>
<html lang="en">
<head>
  <?php
    include_once("element/connection.php");
   ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Tables</title>
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



                  <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">E-Pins</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th width="30">#</th>
                                                <th width="200">Name</th>
                                                <th>UserID</th>
                                                <th width="300">Email</th>
                                                <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $a=0;
                                            $query=mysqli_query($conn,"SELECT * FROM `users`");
                                            while ($pi_t_h=mysqli_fetch_array($query)) {
                                              ?>
                                              <tr>
                                                <th><?php echo ++$a ?></th>
                                                <th><?php echo $pi_t_h['name'] ?></th>
                                                <th><?php echo $pi_t_h['user_id'] ?></th>
                                                <th><?php echo $pi_t_h['email'] ?></th>
                                                <th>
                                                    <?php
                                                    if($pi_t_h['user_status'] === "0"){ ?>
                                                    <form method="POST" action="../admin/element/redirect.php">
                                                    <input hidden value="<?php echo $pi_t_h['user_id']; ?>" class="form-control form-control-lg" name="user_id" type="text" placeholder="Username" autocomplete="off">
                                                    <input hidden value="<?php echo "1"; ?>" class="form-control form-control-lg" name="user_status">
                                                    <input hidden value="<?php echo $pi_t_h['sponsor_id']; ?>" class="form-control form-control-lg" name="sponsor_id">
                                                    <button type="submit" name="activate" class="btn btn-success btn-sm btn-block">Activate</button>
                                                    </form>
                                                    <?php }else{ ?>
                                                        <form method="POST" action="../admin/element/redirect.php">
                                                    <input hidden value="<?php echo $pi_t_h['user_id']; ?>" class="form-control form-control-lg" name="user_id" type="text" placeholder="Username" autocomplete="off">
                                                    <input hidden value="<?php echo "0"; ?>" class="form-control form-control-lg" name="user_status">
                                                    <button type="submit" name="deactivate" class="btn btn-danger btn-sm btn-block">Deactivate</button>
                                                    </form>
                                                    <?php }
                                                    ?>
                                                    
                                                </th>
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
