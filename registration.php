<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Join Member</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
        <!-- sidebar -->
        <?php include 'element/sidebar.php';
        if(isset($_GET['user_id'])){
            $s_name = $_GET['user_id'];
        }else{
            $s_name = $my_id;
        } 
        $get_name = "SELECT * FROM users WHERE user_id='$s_name'";
        $sql_name = mysqli_query($conn, $get_name);
        $got_name = mysqli_fetch_assoc($sql_name);
        
        ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                              <div class="card">
                                  <h5 class="card-header">New Registration Form</h5>
                                  <span style="margin-left:20px;">
                                  <?php
                                        if(isset($_GET['m']) && isset($_GET['id'])){
                                           if($_GET['m'] == 2){
                                                echo '<b class="text-bold text-danger">Email Already Exist.</b><br>';
                                            }elseif($_GET['m'] == 3){
                                                echo '<b class="text-bold text-danger">Email is Already Exist</b><br>';
                                            }
                                        }
                                        ?></span><br>
                                  <div class="card-body">
                                      <form method="POST" action="element/redirect.php">
                                        <div class="form-group">
                                            <label for="inputUserName">Sponsor ID</label>
                                            <input id="inputUserName" name="sponsor_id" type="text" value="<?php if(isset($_GET)){if(isset($_GET['user_id'])){ echo $_GET['user_id']; }else{echo $my_id;}} ?>" class="form-control" readonly>
                                            <br><p> <b>Sponsor Name: </b> <?php echo $got_name['name']; ?></p>
                                        </div>
                                        <br>
                                        <!-- <div class="form-group">
                                            <label for="inputUserName">PIN</label>
                                            <input id="inputUserName" name="pin" type="text" class="form-control" >
                                        </div> -->
                                          <div class="form-group">
                                              <label for="inputUserName">Name</label>
                                              <input id="inputUserName" type="text" name="user_name" required="" placeholder="Enter Name" class="form-control"  pattern="[a-zA-Z\s]+">
                                          </div>
                                          <br>
                                          <div class="form-group">
                                              <label for="inputUserName">Email</label>
                                              <input id="inputUserName" type="email" name="user_mail" required="" placeholder="Enter Valid Email" class="form-control">
                                          </div>
                                          <br>
                                          <div class=" form-group btn-group btn-group-toggle" data-toggle="buttons">
                                              <?php
                                                  if(isset($_GET['side'])){
                                                      if($_GET['side'] === "left"){
                                                          echo '<label class="btn btn-primary active">
                                                  
                                                          <input type="radio" name="position" id="option1" value="0" checked>Left
                                                      </label>';
                                                      }elseif($_GET['side'] === "right"){
                                                          echo '<label class="btn btn-primary active">
                                                          <input type="radio" name="position" id="option2" value="1" checked> Right
                                                      </label>';
                                                      }
                                                  }else{ ?>
                                                        <label class="btn btn-primary active">
                                                  
                                                  <input type="radio" name="position" id="option1" value="0" checked>Left
                                              </label>
                                              <label class="btn btn-primary ">
                                                          <input type="radio" name="position" id="option2" value="1"> Right
                                                      </label>
                                                  <?php

                                                  }
                                                  ?>
                                              
                                          </div>
                                          <br>
                                          <br>
                                          <div class="form-group">
                                              <label for="gender">Gender</label>
                                              <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                                                <option value="1" selected>Male</option>
                                                <option value="0">Female</option>
                                              </select>
                                            </div><br>
                                          <div class="form-group">
                                              <label for="inputPassword">Phone No</label>
                                              <input id="inputPassword" type="tel" name="user_mob" placeholder="mobile no" required="" class="form-control" pattern="[0-9]{10}">
                                          </div>
                                          <br>
                                          <div class="form-group">
                                              <label for="inputRepeatPassword">Password</label>
                                              <input id="inputRepeatPassword" name="password" data-parsley-equalto="#inputPassword" type="password" required="" placeholder="Password" class="form-control" pattern="[a-zA-Z0-9@]{6,20}">
                                              <p><small>Password length should not less than 6 digit (only Numbers, Alphabet and @ is allowed)</small> </p>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-6">

                                                   <button type="submit" name="user_registration" class="btn btn-space btn-primary">Add Member</button>


                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                          <?php
                          if(isset($_GET['m'])){
                          if($_GET['m'] === "1"){?>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="card" style="padding:20px;">
                                    <h3 class="success-text" style="color:darkgreen;">Successfully Registered</h3>

                                </div>
                                <div class="card" style="padding:20px;">
                                    <h3>Userid :<b class="userid"> <?php  if(isset($_GET['id'])){echo $_GET['id'];} ?></b></h3>
                                    <h3>Password :<b class="userid"> Sent on email</b></h3>
                                    <!-- <h4 class="success-text" style="color:darkgreen;"><a href="identity-card.php">click here to download your identity card</h4> -->

                                </div>
                            </div>
                          <?php 
                          }
                        }
                          ?>
            </div>
            

        </div>
                                                  
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
</body>
</html>