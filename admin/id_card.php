<!doctype html>
<html lang="en">
<?php
  include_once("element/connection.php");
  $ii = $_GET['id'];
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$ii'"));
 ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Identity Card Download</title>
</head>

<body>
<style>
    .tick-mark{
    color: green;
    background: transparent;
    padding: 20px;
    display:inline;
    font-size: 60px;
}
.tick-out{
    /* border: 2px solid green; */
    width: 94px;
    border-radius: 400px;
    height: 90px;
    text-align: center;
    margin: auto;
    
}
.success-text{
    margin-top: 20px;
    text-align: center;
}
.userid{
    text-decoration: underline;
    text-decoration-color: black;
    color: red;
}
.success-text a{
    color: blue;
    text-decoration: underline;
}

.card-header img{
    width: 100px;
    border: 1px solid green;
    border-radius: 360px;
    display: block;
    margin-left: auto;
    margin-right: auto;
  user-select: none;
  margin-top: 30px;
}
.user_id{
    color: green;
    text-align: center;
}
.about-row{
    margin:0 20px;
    padding-top: 20px;
}

.about-row h3{
    font-weight: bold;
    color: black;
    border-bottom: 1.5px solid #eee;
    
}

.about-row b{
    font-weight: 200;
    color: rgb(12, 11, 11);
    
}

.id_card_img{
    width: 30px;
}
</style>
    <div class="dashboard-main-wrapper">

	    <?php
      include_once("element/sidebar.php");
       ?>

	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">

                      <div class="row">
                          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                              <div class="card" id="id_card">
                                  <div class="card-header">
                                    <p class="img-out"><img  src="download.jpg" alt="user"></p>
                                    <h3 class="user_id"><b>Member</b></h3>   
                                  </div>
                                  <div class="about">
                                      <div class="about-row">
                                      <div class="about-span"><h3>UserID: <b><?php echo $data['user_id']; ?></b></h3></div>
                                          <div class="about-span"><h3>Name: <b><?php echo $data['name']; ?></b></h3></div>
                                          <div class="about-span"><h3>Gender: <b><?php if($data['gender'] === "1"){echo "Male";}else{echo "Female";} ?></b></h3></div>
                                          <div class="about-span"><h3>DOB: <b><?php echo $data['dob']; ?></b></h3></div>
                                          <div class="about-span"><h3>Email: <b><?php echo $data['email']; ?></b></h3></div>
                                          <div class="about-span"><h3>Mobile: <b><?php echo $data['mobile']; ?></b></h3></div>
                                          
                                          
                                      </div>
                                  </div>
                              </div>
                              <div id="output"></div>
                              <div id="output1"></div>
                              <a href="approve_idcard.php?user_id=<?php echo $data['user_id']; ?>"><button class="btn btn-primary btn-lg active">Download Your Identity Card</button></a>
                          
                              
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
