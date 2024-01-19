<!doctype html>
<html lang="en">
<head>
  <?php
  
    include_once("element/connection.php");
    if (isset($_POST['approve'])) {
        $iid = $_POST['user_id'];
  
        $filename = $_FILES["fileupload"]["name"];
        $tempname = $_FILES["fileupload"]["tmp_name"];    
            $folder = "image/".$filename;
              
      
            // Get all the submitted data from the form
            

              
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder))  {
                if(mysqli_query($conn,"UPDATE `users` SET `id_img`='$folder' WHERE `user_id`='$iid'")){
                    mysqli_query($conn,"UPDATE `users` SET `id_card`='2' WHERE `user_id`='$iid'");
                }
            }else{
                $msg = "Failed to upload image";
          }
      }
    
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
    <title>Approve ID Card</title>
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Agent Table</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Id Card</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  
                                                  if(isset($_GET['user_id'])){
                                                    $id=$_GET['user_id'];
                                                    $income_h_query=mysqli_query($conn,"SELECT * FROM `users` WHERE `id_card`='1' AND `user_id`='$id'");
                                                    $datas=mysqli_fetch_array($income_h_query);
                                                    
                                                    ?>
                                                        <tr>
                                                        <td><?php echo "1"; ?></td>
                                                        <td><a href="profile.php?myid=<?php echo $id ?>"><?php echo $id; ?></a></td>
                                                        <td><?php echo $datas['name']; ?></td>
                                                        <td><?php echo $datas['email']; ?></td>
                                                        <td>
                                                        <a href="id_card.php?id=<?php echo $datas['user_id']; ?>"><button type="submit" name="download-id" class="btn btn-primary btn-sm btn-block">Download Card</button></a>
                                                        </td>
                                                        <td>
                                                          <form method="POST" action="approve_idcard.php" enctype="multipart/form-data">
                                                                  <input hidden value="<?php echo $id ?>" class="form-control form-control-lg" name="user_id" type="text" placeholder="Username" autocomplete="off">
                                                                  <input type="file" class="form-control form-control-lg" name="fileupload" >
                                                              <button type="submit" name="approve" class="btn btn-primary btn-sm btn-block">Approve</button>
                                                          </form>
                                                        </td>
                                                      </tr>
                                                    <?php

                                                  }else{
                                                    $a=0;
                                                    $income_h_query=mysqli_query($conn,"SELECT * FROM `users` WHERE `id_card`='1'");
                                                  while ($data=mysqli_fetch_array($income_h_query)) {
                                                    $id=$data['user_id'];
                                                    
                                                    ?>
                                                      <tr>
                                                        <td><?php echo ++$a ?></td>
                                                        <td><a href="profile.php?myid=<?php echo $id ?>"><?php echo $id; ?></a></td>
                                                        <td><?php echo $data['name']; ?></td>
                                                        <td><?php echo $data['email']; ?></td>
                                                        <td>
                                                        <a href="id_card.php?id=<?php echo $data['user_id']; ?>"><button type="submit" name="approve" class="btn btn-primary btn-sm btn-block">Approve</button></a>
                                                        </td>
                                                        <td>
                                                          <form method="POST" action="" enctype="multipart/form-data">
                                                                  <input hidden value="<?php echo $id ?>" class="form-control form-control-lg" name="user_id" type="text" placeholder="Username" autocomplete="off">
                                                                  <input type="file" class="form-control form-control-lg" name="fileupload" >
                                                              <button type="submit" name="approve" class="btn btn-primary btn-sm btn-block">Download Card</button>
                                                          </form>
                                                        </td>
                                                      </tr>
                                                    <?php
                                                    }
                                                  }
                                                 ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <script type="text/javascript">
  
        // Define the function 
        // to screenshot the div
        // function takeshot() {
            let div =
                document.getElementById('id_card');
            
            // Use the html2canvas
            // function to take a screenshot
            // and append it
            // to the output div
            html2canvas(div).then(
                function (canvas) {
                    document
                    .getElementById('output')
                    .appendChild(canvas);
                    div.style.display="none";
                })
        // }

        var can = document.getElementById('output');
var ctx = can.getContext('2d');

ctx.fillRect(50,50,50,50);

var img = new Image();
img.src = can.toDataURL();
document.getElementById("output1").appendChild(img);

                        //   }
    </script>

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
</body>

</html>
