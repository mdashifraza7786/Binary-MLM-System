<!doctype html>
<html lang="en">
<head>
  <?php
    include_once("element/connection.php");
   ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Tables</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>
<style>
    .fa-times, .fa-pencil-alt{
        font-size:17px;
        cursor: pointer;
        margin:0 10px;
    }
</style>
    <div class="dashboard-main-wrapper">

        <?php
        include_once("element/sidebar.php");
       
         ?>

        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">

                <div class="row">
                  <?php 
 if(isset($_GET['delete'])){
     
    echo "<a href='?delete_confirm=".$_GET['delete']."'><button class='btn btn-primary' style='margin-right:20px;'>Delete</button></a><br><a href='products.php'><button class='btn btn-primary'>Cancel</button></a>";exit;
}
if(isset($_GET['delete_confirm'])){
    $gid = $_GET['delete_confirm'];
    $sl = "DELETE FROM products WHERE id='$gid'";
   if(mysqli_query($conn, $sl)){
    //    header('Location: products.php');
   }
}
                  ?>


                  <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">Products List</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th >Product Image</th>
                                                <th>Product Pic</th>
                                                <th >Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $query=mysqli_query($conn,"SELECT * FROM `products`");
                                            while ($pi_t_h=mysqli_fetch_array($query)) {
                                              ?>
                                              <tr>
                                                <th><img src="<?php echo $pi_t_h['thumb']; ?>"  width="70%" alt=""></th>
                                                <th width="50%"><?php echo $pi_t_h['title'] ?></th>
                                                <th width="15%">₹<?php echo $pi_t_h['price'] ?></th>
                                                <th width="25%"><center>
                                                    <li class="fas fa-pencil-alt"></li>
                                                    <a href="?delete=<?php echo $pi_t_h['id']; ?>"><li class="fas fa-times"></li></a>
                                                    <a href="../product.php?id=<?php echo $pi_t_h['id']; ?>"><li class="fas fa-eye"></li></a>
                                                </center></th>
                                              </tr>
                                              <?php
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
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

</body>

</html>
