<?php 
include 'element/connection.php';
$user_sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$my_id'");

$user_data = mysqli_fetch_array($user_sql);
?>
<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </span>
                    <span class="logo-text">MLM</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link " href="index.php"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
                    
                    <li class="collapsed">
                        <a class="m-link"  href="withdraw.php">
                        <i class="icofont-money fs-5"></i> <span>Withdraw</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link"  href="registration.php">
                        <i class="icofont-handshake-deal"></i> <span>Join Member</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link"  href="reffer.php">
                        <i class="icofont-share-alt"></i> <span>Reffer Link</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Downline</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-product">
                                <li><a class="ms-link" href="tree.php">Binary Tree</a></li>
                                <li><a class="ms-link" href="level.php">Downline List</a></li>
                            </ul>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                        <i class="icofont-notepad fs-5"></i> <span>Profile</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-order">
                            <li><a class="ms-link" href="profile.php">Personal Details</a></li>
                            <li><a class="ms-link" href="bank.php">Bank</a></li>
                            <li><a class="ms-link" href="change-password.php">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link"  href="logout.php">
                        <i class="icofont-share-alt"></i> <span>Logout</span></a>
                    </li>
                    
                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                            
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <!-- <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold"><?php echo $user_data['name']; ?></span></p>
                                    <small>Membership Type</small>
                                </div> -->
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                    <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/profile_av.svg" alt="profile">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w-300">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="assets/images/profile_av.svg" alt="profile">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold"><?php echo $user_data['name']; ?></span></p>
                                                    <small class=""><?php echo $user_data['email']; ?></small>
                                                    <br>
                                                    <?php
                                                    if($user_data['member_type'] == "1"){
                                                        echo '<small class=""> <b>Membership Type:</b> Basic</small>';
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <a href="profile.php" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
                                            <!-- <a href="order-invoices.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-file-text fs-5 me-3"></i>Order Invoices</a> -->
                                            <a href="logout.php" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
        
                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>
        
                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                            <div class="input-group flex-nowrap input-group-lg">
                                <!-- <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping"> -->
                                <!-- <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button> -->
                                <?php
                                if($user_data['user_status'] == 0){
                                    echo '<a href="membership.php"><h3 class="btn btn-danger" style="color:white;font-weight:bold;">Click Here To Activate Your Account</h3></a>';
                                }elseif($user_data['user_status'] == 1){
                                    echo '<h3 class="btn btn-success" style="color:white;font-weight:bold;">Your Account Is Active</h3>';
                                }
                                ?>
                            </div>
                        </div>
        
                    </div>
                </nav>
            </div>