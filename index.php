<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- plugin css file  -->
    <link rel="stylesheet" href="assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="assets/plugin/datatables/dataTables.bootstrap5.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-">
        
        <?php include 'element/sidebar.php'; ?>
        <?php
$d = date("d")-1;

$date0=date_create(date("Y-m-d"));
date_sub($date0,date_interval_create_from_date_string("0 days"));
$final0 = date_format($date0,"Y-m-d");

$date1=date_create(date("Y-m-d"));
date_sub($date1,date_interval_create_from_date_string("1 days"));
$final1 = date_format($date1,"Y-m-d");

$date2=date_create(date("Y-m-d"));
date_sub($date2,date_interval_create_from_date_string("7 days"));
$final2 = date_format($date2,"Y-m-d");

$date3=date_create(date("Y-m-d"));
date_sub($date3,date_interval_create_from_date_string("$d days"));
$final3 = date_format($date3,"Y-m-d");


$user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$my_id'"));

$uwt = mysqli_query($conn,"SELECT sum(amount) As Total FROM `wallet` WHERE `user_id`='$my_id' AND `date`='$final0'");
$uwt_num = mysqli_num_rows($uwt);
$user_wallet_today=mysqli_fetch_array($uwt);

$uwy = mysqli_query($conn,"SELECT sum(amount) As Total FROM `wallet` WHERE `user_id`='$my_id' AND `date`='$final1'");
$uwy_num = mysqli_num_rows($uwy);
$user_wallet_yesterday=mysqli_fetch_array($uwy);


$uww = mysqli_query($conn,"SELECT sum(amount) As Total FROM `wallet` WHERE `user_id`='$my_id' AND `date`>='$final2'");
$uww_num = mysqli_num_rows($uww);
$user_wallet_week=mysqli_fetch_array($uww);

$uwm = mysqli_query($conn,"SELECT sum(amount) As Total FROM `wallet` WHERE `user_id`='$my_id'  AND `date`>='$final3'");
$uwm_num = mysqli_num_rows($uwm);
$user_wallet_month=mysqli_fetch_array($uwm);



$payout_data=mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(amt) AS Total FROM `witdrawl` WHERE `user_id`='$my_id' AND `status`='1'"));

$payout_data_pending=mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(amt) AS Total FROM `witdrawl` WHERE `user_id`='$my_id' AND `status`='0'"));

$afff = mysqli_query($conn,"SELECT SUM(amt) AS Total FROM `witdrawl` WHERE `user_id`='$my_id' AND `status`='0'");

$payout_pending_rows = mysqli_num_rows($afff);

$payout_paid_rows = mysqli_num_rows(mysqli_query($conn,"SELECT  SUM(amt) AS Total FROM  `witdrawl` WHERE `user_id`='$my_id' AND `status`='1'"));

$pair_d = mysqli_query($conn,"SELECT SUM(amt) AS Total FROM `income_history` WHERE `desp`='PAIR INCOME' AND `user_id`='$my_id'");

$pair_m_data=mysqli_fetch_array($pair_d);

$pair_row = mysqli_num_rows($pair_d);

?>

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12">
                        
                            <div class="tab-content mt-1">
                                
                            <div class="tab-pane fade show active">
                                    <div class="row g-1 g-sm-3 mb-3 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">Today Income</h4>
                                                        <div><h3>&#8377;<?php if($uwt_num >= 1 && $user_wallet_today['Total']!= ""){ echo $user_wallet_today['Total']; }else{ echo "0";} ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-money fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">Yesterday Income</h4>
                                                        <div><h3>&#8377;<?php if($uwy_num >= 1 && $user_wallet_yesterday['Total']!= ""){ echo $user_wallet_yesterday['Total']; }else{ echo "0";} ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-money fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">This Week Income</h4>
                                                        <div><h3>&#8377;<?php if($uww_num >= 1 && $user_wallet_week['Total']!= ""){ echo $user_wallet_week['Total']; }else{ echo "0";} ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-money fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">This Month Income</h4>
                                                        <div><h3>&#8377;<?php if($uwm_num >= 1 && $user_wallet_month['Total']!= ""){ echo $user_wallet_month['Total']; }else{ echo "0";} ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-money fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">Total Payout</h4>
                                                        <div><h3>&#8377;<?php if($payout_paid_rows >= 1 && $payout_data['Total']!= ""){ echo $payout_data['Total']; }else{ echo "0";} ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-tick-mark fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">Pending Payout</h4>
                                                        <div><h3 class="">&#8377;<?php if($payout_pending_rows >= 1 && $payout_data_pending['Total']!= ""){ echo $payout_data_pending['Total']; }else{ echo "0";} ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-spinner fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">Pair Matching Income</h4>
                                                        <div><h3>₹<?php if($pair_row >= 1 && $pair_m_data['Total']!= ""){ echo $pair_m_data['Total']; }else{ echo '0';} ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-site-map fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">Total Direct</h4>
                                                        <div><h3><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `sponsor_id`='$my_id'")) ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-hand-drag1 fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <h4 class="text-muted">Downline</h4>
                                                        <div><h3><?php echo $user_data['left_count']+$user_data['right_count'] ?></h3></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-long-arrow-down fs-3 color-lightyellow"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3"> 
                        <div class="col-md-12">
                            <div class="card"> 
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Recent Transactions</h6>
                                    <h6 class="m-0 fw-bold">Total Income: 
                                        <?php
                                        $net_income=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(amt) net_income FROM `income_history` WHERE `user_id`='$my_id' AND `cr_dr`='0'"));
                                        echo "₹".$net_income['net_income'];
                                        ?>

                                    </h6>
                                </div>
                                <div class="card-body"> 
                                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Amount</th>
                                                <th>Transaction Type</th>
                                                <th>Transaction Date</th>
                                                <th>Credit / Debit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                  $a=0;
                                                  $income_h_query=mysqli_query($conn,"SELECT * FROM `income_history` WHERE `user_id`='$my_id' ORDER BY srno Desc");
                                                  while ($data=mysqli_fetch_array($income_h_query)) {
                                                    ?>
                                                      <tr>
                                                        <td><?php echo ++$a ?></td>
                                                        <td>
                                                            <?php
                                                            if(!$data['cr_dr']){
                                                                echo '<h5 class="text-success">+ ₹'. $data['amt'].'</h5>';
                                                            }else{
                                                                echo '<h5 class="text-danger">- ₹'. $data['amt'].'</h5>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data['desp'] ?></td>
                                                        <td><?php echo $data['datee'] ?></td>
                                                        <td><?php
                                                          if (!$data['cr_dr']) {
                                                            echo '<span class="badge bg-success">Credit</span>';
                                                          } else {
                                                            echo '<span class="badge bg-warning">Debit</span>';
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
                    </div><!-- Row end  -->
                    
                </div>
            </div>
            
        </div>
    
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js -->
    <script src="assets/bundles/apexcharts.bundle.js"></script>
    <script src="assets/bundles/dataTables.bundle.js"></script>  

    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
    <!-- <script src="../js/page/index.js"></script> -->
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