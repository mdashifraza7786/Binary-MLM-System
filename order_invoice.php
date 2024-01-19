<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <?php 
    include 'element/connection.php';
    $pgi = $_GET['iid'];
    $sql = mysqli_query($conn, "SELECT * FROM user_invoice WHERE ur_id='$my_id' AND id='$pgi'");
    $sql_num = mysqli_num_rows($sql);
    $data = mysqli_fetch_array($sql);
    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $data['pr_name']; ?> - Invoice</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
  
    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
    <?php include 'element/sidebar.php'; ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0 py-3 pb-2"><?php echo $data['pr_name']; ?> - Invoice</h3>
                               
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <?php if($sql_num >= 1){ ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="tab-content">
                                
                                
                                <div class="tab-pane fade show active" id="Invoice-Simple" >
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="card p-xl-5 p-lg-4 p-0">
                                                <div class="card-body">
                                                    <div class="mb-3 pb-3 border-bottom">
                                                        Invoice
                                                        <strong><?php echo $data['date']; ?></strong>
                                                        <span class="float-end"> <strong>transection id:</strong> #<?php echo $data['id']; ?></span>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-3">From:</h6>
                                                            <div><strong>eBazar Shop</strong></div>
                                                            <div>111  Berkeley Rd</div>
                                                            <div>STREET ON THE FOSSE, Poland</div>
                                                            <div>Email: info@ebazar.com</div>
                                                            <div>Phone: +44 888 666 3333</div>
                                                        </div>
                                                        
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-3">To:</h6>
                                                            <div><strong><?php echo $data['first_name']." ".$data['last_name']; ?></strong></div>
                                                            <div><?php echo $data['address_1']; ?></div>
                                                            <div style=" text-transform: capitalize;"><?php if($data['address_2']!=""){echo $data['address_2'].", ";} ?> <?php echo $data['city']; ?>, <?php echo $data['stat']; ?> - <?php echo $data['pin']; ?></div>
                                                            <div>Email: <?php echo $data['email']; ?></div>
                                                            <div>Phone: <?php echo $data['phone_number']; ?></div>
                                                        </div>
                                                    </div> <!-- Row end  -->
                                                    
                                                    <div class="table-responsive-sm">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">#</th>
                                                                    <th>Item</th>
                                                                    <!--<th>Description</th>-->
                                                                    <th class="text-end">Item Cost</th>
                                                                    <th class="text-center">Products Item</th>
                                                                    <th class="text-end">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">1</td>
                                                                    <td><?php echo $data['pr_name']; ?></td>
                                                                    <!--<td>Men Watch for Gold Color</td>-->
                                                                    <td class="text-end">₹<?php echo $data['pr_price']; ?></td>
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-end">₹<?php echo $data['pr_price']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                    
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-5">
                                                        
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-sm-5 ms-auto">
                                                            <table class="table table-clear">
                                                                <tbody>
                                                                    <tr>
                                                                        <td ><strong>Subtotal</strong></td>
                                                                        <td class="text-end">₹<?php echo $data['pr_price']; ?></td>
                                                                    </tr>
                                                                    <!--<tr>-->
                                                                    <!--    <td ><strong>Tax(18%)</strong></td>-->
                                                                    <!--    <td class="text-end">$59.4</td>-->
                                                                    <!--</tr>-->
                                                                    <tr>
                                                                        <td ><strong>Total</strong></td>
                                                                        <td class="text-end"><strong>₹<?php echo $data['pr_price']; ?></strong></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div> <!-- Row end  -->
                    
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h6>Terms &amp; Condition</h6>
                                                            <p class="text-muted">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over</p>
                                                        </div>
                                                        <!--<div class="col-lg-12 text-end">-->
                                                        <!--    <button type="button" onclick="printDiv('Invoice-Simple')" class="btn btn-outline-secondary btn-lg my-1"><i class="fa fa-print"></i> Print</button>-->
                                                        <!--    <button type="button" class="btn btn-primary btn-lg my-1"><i class="fa fa-paper-plane-o"></i> Send Invoice</button>-->
                                                        <!--</div>-->
                                                    </div> <!-- Row end  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Row end  -->
                                </div> <!-- tab end  -->
                                
                                <div class="col-lg-12 text-end">
                                                            <button type="button" onclick="printDiv('Invoice-Simple')" class="btn btn-outline-secondary btn-lg my-1"><i class="fa fa-print"></i> Print</button>
                                                            <button type="button" class="btn btn-primary btn-lg my-1"><i class="fa fa-paper-plane-o"></i> Send Invoice</button>
                                                        </div>
                            </div>
                        </div>

                    </div> <!-- Row end  -->
                    <?php }else{
                    echo "<h2>You Don't Have Any Invoice</h2>";
                    } ?>
                </div>
            </div>

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
    <script>
        function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
</body>
</html>