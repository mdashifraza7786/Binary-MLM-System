<!doctype html>
<html lang="en">
<head>
  <?php
    include_once("element/connection.php");
   ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="dashboard-main-wrapper">

	    <?php
      include_once("element/sidebar.php");
       ?>

	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">

          <div class="row">


            <div class="col-lg-8 col-sm-12 card bg-light p-0">
              <h5 class="card-header">Tree View</h5>
            <div class="card-body">



              <?php
                $id=[$my_id];
                $i=0;
                for($i;$i<=2;$i++){
                  $temp_id_index=0;
                  $divide=pow(2,$i);
                  ?>
                  <div class="row p-3">
                    <?php
                        for ($d=0; $d < $divide ; $d++) {
                          ?>
                            <div class="col-<?php echo 12/$divide ?>  p-3 text-center">
                                <img src="<?php echo ($id[$d]!=0)?"download.jpg":"download2.jpg" ?>" class="img-fluid" alt="" style="width:50px"><br>
                                <p id="<?php echo $id[$d] ?>"  onclick=<?php echo ($id[$d]!=0)?"show_details(this)":"" ?>><?php echo $print_id=$id[$d] ?></p>
                            </div>
                          <?php
                          for ($p=0; $p < 2 ; $p++) {
                            $temp_id[$temp_id_index]=fetch_left_right($p,$print_id);
                            $temp_id_index++;
                          }
                        }
                        $id=$temp_id;
                     ?>
                  </div>
                  <?php
                }


                function fetch_left_right($side,$agent_id){
                  global $conn;
                  if ($side==0) {
                    $pos='left_side';
                  } else {
                    $pos='right_side';
                  }
                  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$agent_id'"));
                  if ($agent_id!=0) {
                    return $data[$pos];
                  } else {
                    return 0;
                  }

                }
               ?>



            </div>
           </div>




           <div class="col-lg-4 col-sm-12">
             <div class="card">
                 <h5 class="card-header"> Sales By Social Source</h5>
                 <div class="card-body p-0">
                     <ul class="social-sales list-group list-group-flush">
                         <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle facebook-bgcolor mr-2"><i class="fab fa-facebook-f"></i></span><span class="social-sales-name">Facebook</span><span class="social-sales-count text-dark">120 Sales</span></li>
                         <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle twitter-bgcolor mr-2"><i class="fab fa-twitter"></i></span><span class="social-sales-name">Twitter</span><span class="social-sales-count text-dark">99 Sales</span></li>
                         <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle instagram-bgcolor mr-2"><i class="fab fa-instagram"></i></span><span class="social-sales-name">Instagram</span><span class="social-sales-count text-dark">76 Sales</span></li>
                         <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle pinterest-bgcolor mr-2"><i class="fab fa-pinterest-p"></i></span><span class="social-sales-name">Pinterest</span><span class="social-sales-count text-dark">56 Sales</span></li>
                         <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle googleplus-bgcolor mr-2"><i class="fab fa-google-plus-g"></i></span><span class="social-sales-name">Google Plus</span><span class="social-sales-count text-dark">36 Sales</span></li>
                     </ul>
                 </div>
             </div>
           </div>
         </div>


      </div>


	                    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	                    <!-- bootstap bundle js -->
	                    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	                    <!-- slimscroll js -->
	                    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
	                    <!-- main js -->
	                    <script src="assets/libs/js/main-js.js"></script>
	                    <!-- morris-chart js -->
	                    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
	                    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
	                    <script src="assets/vendor/charts/morris-bundle/morrisjs.html"></script>
	                    <!-- chart js -->
	                    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
	                    <script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
	                    <!-- dashboard js -->
	                    <script src="assets/libs/js/dashboard-influencer.js"></script>
                      <script type="text/javascript">
                        function show_details(a){
                          $('#exampleModal').modal("show");
                          var agent_id=$(a).attr('id');
                          $('#exampleModalLabel').html(agent_id);
                          $.ajax({
                            url: 'ajax.php',
                            type: 'post',
                            data: {agent_id:agent_id},
                            success:function(response){
                              $('#agent_detail_show_on_model').html(response);
                            }
                          })
                        }
                      </script>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="agent_detail_show_on_model">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
</body>

</html>
