<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Self Downline</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
        <!-- sidebar -->
        <?php include 'element/sidebar.php'; ?>
        <?php
                if (isset($_REQUEST['user_id'])) {
                  $level_sponsor=$_REQUEST['user_id'];
                  if (check_my_downline($level_sponsor,$my_id)) {
                    // code...
                  }else {
                    $level_sponsor=$my_id;
                  }
                } else {
                  $level_sponsor=$my_id;
                }

                 ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
            <div class="row">
                            <div class="col-md-12">


                                                 <div class="main-card mb-3 card">
                                                     <div class="card-header"></div>
                                                     <div class="table-responsive">
                                                         <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                            <thead>
                                                             <tr>
                                                                 <th class="text-center">#</th>
                                                                 <th class="text-center">Name</th>
                                                                 <th class="text-center">Mobile</th>
                                                                 <th class="text-center"> Action </th>
                                                             </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php
                                                                $data=mysqli_query($conn,"SELECT * FROM `users` WHERE `sponsor_id`='$level_sponsor'");
                                                                  $a=1;
                                                                  if (mysqli_num_rows($data)>0) {
                                                                    while ($user_detail=mysqli_fetch_array($data)) {
                                                                      ?><tr><td class="text-center text-muted"><?php echo $a; ?></td>
                                                                      <td class="text-center">
                                                                          <div class="widget-content p-0">
                                                                              <div class="widget-content-wrapper">
                                                                                  <div class="widget-content-left flex2">
                                                                                      <div class="widget-heading">
                                                                                        <?php echo $user_detail['name'] ?>
                                                                                      </div>
                                                                                      <div class="widget-subheading opacity-7"><?php echo $user_detail['user_id'] ?></div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </td>
                                                                      <td class="text-center"><?php echo $user_detail['mobile'] ?></td>
                                                                      <td class="text-center"> <a href="level.php?user_id=<?php echo $user_detail['user_id'] ?>">Downline</a> </td>
                                                                      </tr><?php
                                                                      ++$a;
                                                                    }
                                                                  } else {
                                                                    ?> <tr>
                                                                      <td colspan="4" class="text-center"> Data Not Available</td>
                                                                    </tr> <?php
                                                                  }
                                                                ?>


                                                            </tbody>
                                                           </table>
                                               </div>
                                               </div>




                            </div>
                  </div>
            </div>

        </div>

    </div>
    <?php
                        function check_my_downline($user_id,$login_id){
                          global $conn;
                          $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id'"));
                          $spons_id=$data['sponsor_id'];
                          while ($spons_id!=0) {
                            if ($spons_id==$login_id) {
                              return true;
                            } else {
                              $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spons_id'"));
                              $spons_id=$data['sponsor_id'];
                            }
                          }
                          if ($spons_id==0) {
                            return false;
                          }
                        }
                       ?>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
</body>
</html>