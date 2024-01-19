<?php 
session_start();
if(isset($_SESSION['user_id'])){
    header('Location: ./');
} 
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5 ">
            
            <!-- Body: Body -->
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-xxl">

                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                            <div style="max-width: 25rem;">
                                <div class="text-center mb-5">
                                    <i class="bi bi-bag-check-fill  text-primary" style="font-size: 90px;"></i>
                                </div>
                                <div class="mb-5">
                                    <h2 class="color-900 text-center">A few clicks is all it takes.</h2>
                                </div>
                                <!-- Image block -->
                                
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->
                                <form class="row g-1 p-3 p-md-4"  method="POST" action="element/redirect.php">
                                    <div class="col-12 text-center mb-5">
                                        <h1>Sign in</h1><br>
                                        <?php
                                        if(isset($_GET['m'])){
                                            if($_GET['m'] == 1){
                                                echo '<b class="text-bold text-danger">UserID / Password is incorrect. </b><br>';
                                            }elseif($_GET['m'] == 2){
                                                echo '<b class="text-bold text-danger">Your Account Has Been Blocked. </b><br>';
                                            }elseif($_GET['m'] == 3){
                                                echo '<b class="text-bold text-danger">Please Verify Your Email. Link Sent On Your Email. If You Are Not Getting Email Please Check Spam Folder</b><br>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">UserID</label>
                                            <input required type="textq" class="form-control form-control-lg" name="user_id" placeholder="UserID">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <div class="form-label">
                                                <span class="d-flex justify-content-between align-items-center">
                                                    Password
                                                    <a class="text-secondary" href="forget-password.php">Forgot Password?</a>
                                                </span>
                                            </div>
                                            <input required type="password" name="password" class="form-control form-control-lg" placeholder="********">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button name="login" class="btn btn-lg btn-block btn-light lift text-uppercase">LOGIN</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <span>Don't have an account yet? <a href="signup.php" class="text-secondary">Sign up here</a></span>
                                    </div>
                                </form>
                                <!-- End Form -->
                                
                            </div>
                        </div>
                    </div> <!-- End Row -->
                    
                </div>
            </div>

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
</body>
</html>