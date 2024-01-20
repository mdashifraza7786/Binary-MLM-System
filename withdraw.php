<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Withdraw Request</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
        <!-- sidebar -->
        <?php include 'element/sidebar.php';
        $datas = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$my_id'"));
        $da =  mysqli_query($conn,"SELECT sum(amount) As Total FROM `wallet` WHERE `user_id`='$my_id' AND `status`='0'");
        $da_num = mysqli_num_rows($da);
        $dataaa = mysqli_fetch_array($da);
        ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
            <div class="row">
                <?php 
                if($datas['user_status'] == 1){ ?>
                
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                      <div class="card">
                          <h5 class="card-header">Withdraw Request</h5>

                                  <div class="card-body">
                                      <form method="post" action="element/redirect.php" id="basicform" data-parsley-validate="">
                                          <div class="form-group">
                                              <!-- <label for="inputPassword">Amount</label> -->
                                              <h3> &#8377; <?php if($da_num >= 1 && $dataaa['Total']!= ""){ echo $dataaa['Total']; }else{ echo "0";} ?></h3>
                                              <?php
                                              if($dataaa['Total'] < "500"){
                                                  echo "<p style='color:red;'>Minimum &#8377;500 Required To Withdraw.</p>";
                                              }
                                              ?>
                                              <input type="number" required="" class="form-control" value="<?php echo $dataaa['Total']; ?>" name="amount" hidden>
                                              <input type="text" required="" class="form-control" value="<?php echo $my_id ?>" name="user_id" hidden>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-6">
                                              <?php
                                              if($dataaa['Total'] < "500"){
                                                  echo '<button type="submit" name="withdrawl_request" class="btn btn-space btn-primary" style="cursor:no-drop;" disabled>Withdraw Request</button>';
                                              }else{
                                                  echo '<button type="submit" name="withdrawl_request" class="btn btn-space btn-primary">Withdraw Request</button>';
                                              }
                                              ?>
                                                  
                                              </div>
                                          </div>
                                      </form>
                                  </div>

                      </div>
                    </div>


                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Withdraw History</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myDataTable" class="table table-hover align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>Sr no</th>
                                                <th>Amount</th>
                                                <th>Request Date</th>
                                                <th>Approve Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $a=0;
                                              $data=mysqli_query($conn,"SELECT * FROM `witdrawl` WHERE `user_id`='$my_id'");
                                              while ($d=mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                  <th><?php echo ++$a; ?></th>
                                                  <th> &#8377; <?php echo $d['amt'] ?></th>
                                                  <th><?php echo $d['request_date'] ?></th>
                                                  <th><?php if($d['status'] === "0"){ echo "waiting for approval"; }else{ echo $d['approve_date'];} ?></th>
                                                  <th><?php echo ($d['status'])?"Paid":"Pending" ?></th>                                                  
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
                    <?php
                }else{
                    echo "<h3>Your Account Is Inactive. Please Activate Your Account</h3>";
                }
                ?>

                </div>
            </div>

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/apexcharts.bundle.js"></script>
    <script src="assets/bundles/dataTables.bundle.js"></script>  
    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
    <script>
        $('#myDataTable')
        .addClass( 'nowrap')
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -2], className: 'dt-body-right' }
            ]
        });
    </script>
</body>
</html>
