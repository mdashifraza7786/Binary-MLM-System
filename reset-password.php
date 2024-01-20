<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<?php
if(!isset($_GET['reset'])){
    header('Location: /login.php');
}
$db_host="localhost";
$db_user='database_user';
$db_pass='database_pass';
$db_name='database_name';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$conn) {
  echo "Not connect";
}    
$rese = base64_decode($_GET['reset']);
$verigy = base64_decode($_GET['verify']);
$sql = mysqli_query($conn, "SELECT * FROM users WHERE `user_id`='$verigy' AND `password`='$rese'");
$sql_num = mysqli_num_rows($sql);

$data = mysqli_fetch_array($sql_num);
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="taheme-bluae">

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

                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->
                                <?php
                                if($sql_num > 0){ 
                                ?>
                                <div class="row g-1 p-3 p-md-4" id="re_fo">
                                    <div class="col-12 text-center mb-5">
                                        <img src="assets/images/forgot-password.svg" class="w240 mb-4" alt="" />
                                        <h1>Reset New Password</h1>
                                        <!--<span>Enter the email address you used when you joined and we'll send you instructions to reset your password.</span>-->
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Set New Password</label>
                                            <input type="password" class="form-control form-control-lg" id="n_password" placeholder="*********">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-lg btn-block btn-light lift text-uppercase" onclick="reset_pass()">Reset</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <span class="text-muted"><a href="/login.php" class="text-secondary">Back to Sign in</a></span>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div class="row g-1 p-3 p-md-4" id="re_fo">
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <h2>Reset Link Expired.</h2>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
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
        function reset_pass(){
               var p_size = $("#n_password").val();
               var ab = <?php echo $verigy; ?>;
            $.ajax({
               url:"element/redirect.php",
               type:"POST",
               data: {n_password:p_size, reset_p:ab},
               success: function(data){
                $("#re_fo").html(data);
                 
               }
               
           });
           }
    </script>
    
</body>
</html>