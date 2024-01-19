<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Orders</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
        <!-- sidebar -->
        <?php include 'element/sidebar.php'; 
         $query=mysqli_query($conn,"SELECT * FROM `user_invoice` WHERE paid_status='1' AND ur_id='$my_id'");
        ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0"> Your Orders</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Product Image</th> 
                                                <th>Product name</th>
                                                <th>Price</th>
                                                <th>Size</th> 
                                                <th>Status</th> 
                                                <th>Invoice</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $a = 1;
                                                while($data = mysqli_fetch_array($query)){ ?>
                                            <tr>
                                                <td><strong><?php echo $a++; ?></strong></td>
                                                <td><img src="admin/<?php echo $data['pr_thumb']; ?>" alt="" width="70%"></td>
                                                <td width="55%"><?php echo $data['pr_name']; ?></td>
                                                <td width="15%">₹<?php echo $data['pr_price']; ?></td>
                                                <td width="10%">
                                                <?php echo $data['pr_size'] ?><br>
                                                <!-- <b>Color: </b><?php echo $data['pr_color'] ?><br> -->
                                                </td>
                                                <td>
                                                    <center>
                                                    <?php
                                                    if($data['paid_status'] == 0){
                                                        echo "<b class='badge bg-danger'>Cancelled</b>";
                                                    }elseif($data['paid_status'] == 1){
                                                        echo "<b class='badge bg-primary'>Pending</b>";
                                                    }else{
                                                        echo "<b class='badge bg-success'>Delivered</b>";
                                                    }
                                                    ?>
                                                    </center>
                                                </td>
                                                <td><a class="btn btn-sm btn-white" href="order_invoice.php?iid=<?php echo $data['id']; ?>"><i class="icofont-print fs-5"></i></a></td>
                                            </tr>
                                            
                                                <?php 
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
                </div>
            </div>

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
</body>
</html>