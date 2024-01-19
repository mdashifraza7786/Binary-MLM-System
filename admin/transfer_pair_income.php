<!doctype html>
<html lang="en">
<head>
  <?php
    include_once("element/connection.php");
    if (isset($_REQUEST['transfer_pair_income'])) {

      $user_ida=$_REQUEST['user_id'];
      $amt=$_REQUEST['amount'];
      $date=$_REQUEST['date'];
      $datea = date("Y-m-d H:i:s");
      $wallet_indx = "UPDATE `wallet` SET `amount`=`amount`+$amt WHERE `user_id`='$user_ida'";
      if($conn->query($wallet_indx) === TRUE){
        $darr = "UPDATE `pair_count` SET `status`='1' WHERE `user_id`='$user_ida' AND `date`='$date'";
        if($conn->query($darr) === TRUE){
        mysqli_query($conn,"INSERT INTO `income_history`( `user_id`, `amt`, `desp`, `datee`, `cr_dr`) VALUES ('$user_ida','$amt','PAIR INCOME', '$datea', '0')");
      }
      }
     
      // header("Location:../transfer_pair_income.php");
    }
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
        $pair_date='';
        if (isset($_REQUEST['show_pair_date'])) {
          $pair_date=$_REQUEST['dates'];
        }
         ?>

        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">

                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                      <div class="card">
                          <h5 class="card-header">SELECT DATE</h5>

                                  <div class="card-body">
                                      <form method="post" action="" id="basicform" data-parsley-validate="">

                                          <div class="form-group">
                                              <select class="form-control" name="dates">
                                                <?php
                                                    $dates_from_pair=mysqli_query($conn,"SELECT DISTINCT `date` FROM `pair_count`");
                                                    while ($dates=mysqli_fetch_array($dates_from_pair)) {
                                                      ?>
                                                        <option <?php echo ($pair_date==$dates['date'])?"selected":"" ?> value="<?php echo $dates['date'] ?>"><?php echo $dates['date'] ?></option>
                                                      <?php
                                                    }
                                                 ?>
                                              </select>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-6">
                                                  <button type="submit" name="show_pair_date" class="btn btn-space btn-primary">Submit</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>

                      </div>
                    </div>



                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <?php
                              if (isset($_REQUEST['show_pair_date'])){
                                $t_j_o_g_d=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) total_userid FROM `users` WHERE `registration_date`='$pair_date' AND `status`='0'"));
                                $t_p_c=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(no_of_pair) total_pair FROM `pair_count` WHERE `date`='$pair_date'"));
                                
                                $total_amt=$t_j_o_g_d['total_userid']*50;
                                $total_pair=$t_p_c['total_pair'];
                                // $one_pair_amt=floor($total_amt/$total_pair);
                                $one_pair_amt = "100";
                              }
                             ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Agent id</th>
                                                <th>Pair Count</th>
                                                <th>GENERATED AMOUNT</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php


                                            $query=mysqli_query($conn,"SELECT * FROM `pair_count` WHERE `date`='$pair_date'");
                                            while ($pi_t_h=mysqli_fetch_array($query)) {
                                              ?>
                                              <tr>
                                                <th><?php echo $pi_t_h['user_id'] ?></th>
                                                <th><?php echo $pi_t_h['no_of_pair'] ?></th>
                                                <th><?php echo $pi_t_h['no_of_pair']*$one_pair_amt ?></th>
                                                <th><?php echo ($pi_t_h['status'])?"Paid":"Pending" ?></th>
                                                <th>
                                                    <?php
                                                        if ($pi_t_h['status']) {
                                                          // code...
                                                        } else {
                                                          ?>
                                                            <form class="" action="" method="post">
                                                              <input type="text" name="user_id" value="<?php echo $pi_t_h['user_id'] ?>" hidden>
                                                              <input type="text" name="amount" value="<?php echo $pi_t_h['no_of_pair']*$one_pair_amt ?>" hidden>
                                                              <input type="text" name="date" value="<?php echo $pair_date ?>" hidden>
                                                              <button type="submit" class="btn btn-sm btn-secondary" name="transfer_pair_income">Pay</button>
                                                            </form>
                                                          <?php
                                                        }

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
