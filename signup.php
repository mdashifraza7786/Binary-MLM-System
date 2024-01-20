<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header('Location: registration.php');
    }
    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <style>
        input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button { 
	-webkit-appearance: none;
}
.mg-top{
    margin-top: -11vh;
}
@media only screen and (max-width: 768px) {
    .mg-top{
    margin-top: 0;
}
}
    </style>
    <div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5">
            
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

                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg mg-top">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->
                                <form action="element/redirect.php" method="POST" class="row g-1 p-3 p-md-4">
                                    <div class="col-12 text-center mb-5">
                                        <h1>Create your account</h1><br>
                                        <?php
                                        if(isset($_GET['m']) && isset($_GET['id'])){
                                            if($_GET['m'] == 1){
                                                echo '<b class="text-bold text-success">Account Has Been Created Successfully</b><br>
                                                <span><b>Username: </b>'.$_GET['id'].'</span><br>
                                                <span><b>Password: </b>Sent On Email</span>';
                                            }elseif($_GET['m'] == 2){
                                                echo '<b class="text-bold text-danger">Password & Confirm Password Are Not Matched</b><br>';
                                            }elseif($_GET['m'] == 3){
                                                echo '<b class="text-bold text-danger">Email is Already Exist</b><br>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Sponsor Id</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="Sponsor ID" oninput="get_sname()" id="sponsor" name="sponsor_id" required>
                                            <p id="sponsor_name"></p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                        <label class="form-label">Position</label><br>
                                            <label class="btn btn-primary active">
                                                <input type="radio" name="position" id="option1" value="0">Left
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="position" id="option2" value="1" > Right
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Full name</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="John doe" name="user_name" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control form-control-lg" placeholder="name@example.com" name="user_mail" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label for="gender" class="form-label">Gender</label>
                                              <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                                                <option value="1" selected>Male</option>
                                                <option value="0">Female</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Phone Number</label>
                                            <input type="number" class="form-control form-control-lg" placeholder="+91-0000000000" name="user_mob" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-lg" placeholder="6+ characters required" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Confirm password</label>
                                            <input type="password" class="form-control form-control-lg" placeholder="6+ characters required" name="cpassword" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I accept the <a href="#" title="Terms and Conditions" class="text-secondary">Terms and Conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-lg btn-block btn-light lift text-uppercase" name="user_registrations">SIGN UP</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <span>Already have an account? <a href="login.php" title="Sign in" class="text-secondary">Sign in here</a></span>
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
    <script>
        function get_sname(){
            var spo = $("#sponsor").val();
            $.ajax({
                url:"ajx.php",
                type:"POST",
                data: {spons_id:spo},
                success: function(data){
                    $("#sponsor_name").html(data);
                }
            });
        }
    </script>
</body>
</html>