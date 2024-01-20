<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forget Password</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluae">

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
                                    <!--<h2 class="color-900 text-center">A few clicks is all it takes.</h2>-->
                                </div>
                                <!-- Image block -->
                                
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->
                                <div class="row g-1 p-3 p-md-4" id="re_fo">
                                    <div class="col-12 text-center mb-5">
                                        <img src="assets/images/forgot-password.svg" class="w240 mb-4" alt="" />
                                        <h1>Forgot password?</h1>
                                        <span>Enter the email address you used when you joined and we'll send you instructions to reset your password.</span>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control form-control-lg" id="email_id" placeholder="name@example.com">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-lg btn-block btn-light lift text-uppercase" onclick="reset_pass()">SUBMIT</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <span class="text-muted"><a href="/login.php" class="text-secondary">Back to Sign in</a></span>
                                    </div>
                                </div>
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
               var p_size = $("#email_id").val();
               var ab = "1";
            $.ajax({
               url:"element/redirect.php",
               type:"POST",
               data: {email:p_size, reset:ab},
               success: function(data){
                $("#re_fo").html(data);
                 
               }
               
           });
           }
    </script>
    
</body>
</html>