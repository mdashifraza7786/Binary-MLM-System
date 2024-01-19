<?php 
$db_host="localhost";
$db_user='piiwellc_mlm';
$db_pass='Ashif@786';
$db_name='piiwellc_mlm';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$conn) {
  echo "Not connect";
}

if(isset($_GET['verify_email']) && isset($_GET['verify'])){
    $email = base64_decode($_GET['verify_email']);
    $userid = base64_decode($_GET['verify']);
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND user_id='$userid'");
    if(mysqli_num_rows($sql) >= 1){
        $sql1 = mysqli_query($conn, "UPDATE users SET status='0' WHERE user_id='$userid'");
        if($sql1){
            echo "<h2>Email is Verified. Wait You Are Redirecting On Login Page</h2>";
            header( "refresh:3;url=/" );
        }
    }
    
}else{
    header('Location: /');
}
?>