<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Tree view </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>


    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
        <!-- sidebar -->
        <?php include 'element/sidebar.php'; 
          
        ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
            <div class="row">

      
<div class="col-lg-12 col-sm-12 card bg-light p-0">
  <h5 class="card-header">Tree View</h5>
<div class="card-body">

  <style>
  img{
      user-select:none;
      pointer-events: none;
      user-drag: none;
  }
  
    .joined{
      border-radius:360px;
      border:3px green solid;
    }
    .not-joined{
      border-radius:360px;
      border:3px red solid;
    }
  </style>

  <?php
    if(isset($_GET['userid'])){
      $ia = $_GET['userid'];
      $id = [$ia];
    }else{
      $id=[$my_id];
      $gen=[$user_gd];
    }
    $i=0;
    for($i;$i<=2;$i++){
      $temp_id_index=0;
      $divide=pow(2,$i);
      ?>
      <div class="row p-3">
        <?php
            for ($d=0; $d < $divide ; $d++) {
              $print_id=$id[$d];
              ?>
                <div class="col-<?php echo 12/$divide ?>  p-3 text-center">
                <?php if($id[$d]!=0){ ?>
                  <?php
                  $gender = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE `user_id`='$print_id'"));
                  if($gender['gender']!=0){
                    if($gender['user_status']!=0){
                      echo '<i class="icofont-business-man" style="font-size:80px;color:forestgreen;"></i><br>';
                    }else{
                      echo '<i class="icofont-business-man" style="font-size:80px;color:darkred;"></i><br>';
                    }
                  }else{
                    if($gender['user_status']!=0){
                      echo '<i class="icofont-girl-alt" style="font-size:80px;color:forestgreen;"></i><br>';
                    }else{
                      echo '<i class="icofont-girl-alt" style="font-size:80px;color:darkred;"></i><br>';
                    }
                  }
                  ?>
                  <!-- <i class="icofont-man-in-glasses" style="font-size:80px;color:forestgreen;"></i><br> -->
                <?php }else{ ?>
                  <i class="icofont-user" style="font-size:80px;color:black;"></i><br>
                <?php } ?>
                    
                    <p id="<?php echo $id[$d] ?>"  onclick=<?php echo ($id[$d]!=0)?"show_details(this)":"" ?>><b><?php if($id[$d] == 0) {echo '' ;}else{ echo $gender['name']."<br>"."(".$print_id.")";} ?></b></p>
                    <?php
                    if($divide < 4){
                      echo '<center><img src="img/divider.png" width="55%" height="20%" alt="" srcset=""></center>';
                    }
                    ?>
                    
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

</div>
            </div>

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
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
                        function hide_details(){
                            $('#exampleModal').modal("hide");
                        }
                      </script>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" onclick="hide_details()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="agent_detail_show_on_model">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="hide_details()" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
</body>
</html>