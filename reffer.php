<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Reffer Link</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-bluea">
        
        <!-- sidebar -->
        <?php include 'element/sidebar.php'; ?>
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
            
            <h2>Reffer Link</h2>
          <p id="copiedd"></p>
            <div class="row">
            
            <?php
                $details=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$my_id'"));
            ?>
          
            <textarea style="width:300px;resize:none;margin-left:14px;" readonly id="referLink"  class="form-control"  required><?php echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/signup.php?s_id=".$details['user_id']; ?></textarea>
            
            </div><br>
            <button onclick="myFunctionCopy()" class="btn btn-primary" style="width:25%;"  id="copy_button">Copy Link</button>
            </div>

            </div>
            </div>

        </div>

    </div>
    <script>
function myFunctionCopy() {
  /* Get the text field */
  var copyText = document.getElementById("referLink");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 100000000000000); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  document.getElementById("copy_button").value = "Copied";
  document.getElementById("copy_button").disabled = true;
  document.getElementById("copiedd").innerHTML = "<p style='color:green;font-size:17px;'>Link Copied</p>";
}
</script>
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/bundles/template.js"></script>
</body>
</html>