<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Membership</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluae">
    
        <!-- sidebar -->
        <?php include 'element/sidebar.php'; ?>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">


            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <?php 
                    if($user_data['member_type'] == 1){
                        echo '<div class="col-12 text-center">
                        <h2 class="fw-bold text-success">You Are Already A Member Of Basic Plan</h2>
                        <p class="text-muted mt-4 mx-auto"></p>
                    </div>';
                    }else{ ?>

                    
                    <div class="row mb-5 mt-4">
                        <div class="col-12 text-center">
                            <h2 class="fw-bold">Choose Your Membership Plan</h2>
                            <p class="text-muted mt-4 mx-auto"></p>
                        </div>
                    </div> <!-- Row end  -->

                    <div class="row g-2 justify-content-center align-items-center">
                        
                        <div class="col-xl-3 col-xl-4 col-lg-4 col-sm-12">
                            <div class="card py-0 py-md-4 shadow">
                                <div class="card-body py-4 text-center">
                                    <h6 class="text-uppercase">Basic</h6>
                                    <div><span class="display-5 text-primary">₹2100</span></div>
                                </div>
                                <div class="border-top-0 px-5 card-footer">
                                    <p class="d-flex justify-content-between py-1"><span><i class="fa fa-check-circle"></i> T-shirt:</span> <span>x 1</span></p><hr class="dropdown-divider border-dark">
                                    <p class="d-flex justify-content-between py-1"><span><i class="fa fa-check-circle"></i> Level Income:</span> <span>Upto 10 Level</span></p><hr class="dropdown-divider border-dark">
                                    <p class="d-flex justify-content-between py-1"><span><i class="fa fa-check-circle"></i> Pair Matching Income:</span> <span>YES</span></p><hr class="dropdown-divider border-dark">
                                    <p class="d-flex justify-content-between py-1"><span><i class="fa fa-check-circle"></i> Affiliate Income:</span> <span>YES</span></p><hr class="dropdown-divider border-dark">
                                    
                                </div>
                                <div class="card-body text-center">
                                    <a href="pay/member_ship.php" class="btn btn-primary border lift">Activate Account</a>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- Row end  -->
                    <?php
                    }
                    ?>
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