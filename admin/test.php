<?php
// print_r(json_encode($_POST['my-select']));exit;
$from = $_SERVER['HTTP_REFERER'];
include 'element/connection.php';
if(isset($_POST['add_product'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $content = $_POST['content'];
    $sizes = json_encode($_POST['my-sizes']);
    $colors = json_encode($_POST['my-colors']);
    $filename = $_FILES["fileupload"]["name"];
    $tempname = $_FILES["fileupload"]["tmp_name"];    
    $folder = "image/".$filename;
              
      
            // Get all the submitted data from the form
            

              
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder))  {
                mysqli_query($conn, "INSERT INTO products (title, price, thumb, sizes, color, content, stat) VALUES ('$title', '$price','$folder', '$sizes', '$colors', '$content', '$status')");
                
      }
      
      header('Location: '.$from.'?m=1');
      
}