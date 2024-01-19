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
    <link rel="stylesheet" href="/mlm/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/mlm/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/mlm/assets/libs/css/style.css">
    <link rel="stylesheet" href="/mlm/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="/mlm/assets/vendor/select2/css/select2.css">
    <link rel="stylesheet" href="/mlm/assets/vendor/summernote/css/summernote-bs4.css">
    <link rel="stylesheet" href="/mlm/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/mlm/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/mlm/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/mlm/assets/libs/css/style.css">
    <link rel="stylesheet" href="/mlm/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="/mlm/assets/libs/css/style.css">
    <link rel="stylesheet" href="/mlm/assets/vendor/multi-select/css/multi-select.css">
    
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/select2/css/select2.css">
    <link rel="stylesheet" href="assets/vendor/summernote/css/summernote-bs4.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Add Product</title>
</head>

<body>
<style>
        .form-select{
            background:#eee;
            border:1px solid #ccc;
            box-shadow:0 0 10px 1px #eee;
            padding:5px 10px;
            font-size:15px;
        }
    </style>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

	    <?php
      include_once("element/sidebar.php");
       ?>

	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
            <div class="main-content container-fluid p-0">
                    <div class="email-head">
                        <div class="email-head-title">Add A Product<span class="icon mdi mdi-edit"></span><br><h3 style="color:green;"><?php if(isset($_GET['m'])){if($_GET['m']==1){echo "Product Has Added Successfully."; } }?></h3></div>
                        
                    </div>
                    <form action="test.php" method="POST" enctype="multipart/form-data">
                    <div class="email-compose-fields">
                        <div class="subject">
                            <div class="form-group row pt-2">
                                <!-- <label class="col-md-1 control-label">Title</label> -->
                                <div class="col-md-11">
                                    <input class="form-control" type="text" name="title" placeholder="Title" autocomplate="off">
                                </div>
                            </div>
                            <div class="form-group row pt-2">
                                <!-- <label class="col-md-1 control-label">Title</label> -->
                                <div class="col-md-11">
                                    <input class="form-control" type="number"  name="price" placeholder="Price" autocomplate="off">
                                </div>
                            </div>
                            <div class="form-group row pt-2">
                                <!-- <label class="col-md-1 control-label">Title</label> -->
                                <div class="col-md-11">
                                    <select name="status" id="status" class="form-select">
                                        <option value="1" selected>Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                    
                                </div>
                                
                            </div>
                            <div class="form-group row pt-2">
                                <!-- <label class="col-md-1 control-label">Title</label> -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">Sizes</h5>
                                        <div class="card-body">
                                            <select multiple="multiple" id="my-select" name="my-sizes[]">
                                                <option value='S'>S</option>
                                                <option value='M'>M</option>
                                                <option value='L'>L</option>
                                                <option value='X'>X</option>
                                                <option value='XL'>XL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            <!-- <div class="form-group row pt-2"> -->
                                <!-- <label class="col-md-1 control-label">Title</label> -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">Colors</h5>
                                        <div class="card-body">
                                            <select multiple="multiple" id="my-select" name="my-colors[]">
                                                <option value='Blue'>White</option>
                                                <option value='Black'>Black</option>
                                                <option value='Red'>Red</option>
                                                <option value='Yellow'>Yellow</option>
                                                <option value='Blue'>Blue</option>
                                                <!-- <option value='elem_4'>Elements 4</option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-2">
                                <!-- <label class="col-md-1 control-label">Title</label> -->
                                <div class="col-md-11">
                                   <input type="file" name="fileupload" class="form-control-file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="email editor">
                        <div class="col-md-12 p-0">
                            <div class="form-group">
                                <label class="control-label sr-only" for="summernote">Descriptions </label>
                                <textarea class="form-control" id="summernote" name="editordata" rows="6" placeholder="Write Descriptions"></textarea>
                            </div>
                        </div>
                        <div class="email action-send">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-space" type="submit" name="add_product"> Add Product</button>
                                   </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
             </div>
        </div>
    </div>


</script>

	                    <!-- ============================================================== -->
	                    <!-- end widgets   -->
	                    <!-- ============================================================== -->
	                    <!-- ============================================================== -->
	                    <!-- end main wrapper  -->
	                    <!-- ============================================================== -->
	                    <!-- Optional JavaScript -->
	                    <!-- jquery 3.3.1 -->
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
	                    <script src="/mlm/assets/libs/js/dashboard-influencer.js"></script>
                        <script src="/mlm/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                        <script src="/mlm/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
                        <script src="/mlm/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
                        <script src="/mlm/assets/vendor/select2/js/select2.min.js"></script>
                        <script src="/mlm/assets/vendor/summernote/js/summernote-bs4.js"></script>
                        <script src="/mlm/assets/libs/js/main-js.js"></script>
                        <script src="/mlm/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/mlm/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/mlm/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="/mlm/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="/mlm/assets/libs/js/main-js.js"></script>
    
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/select2/js/select2.min.js"></script>
    <script src="assets/vendor/summernote/js/summernote-bs4.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({ tags: true });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300

        });
    });
    </script>
    <script>
    $('#my-select, #pre-selected-options').multiSelect()
    </script>
    <script>
    $('#callbacks').multiSelect({
        afterSelect: function(values) {
            alert("Select value: " + values);
        },
        afterDeselect: function(values) {
            alert("Deselect value: " + values);
        }
    });
    </script>
    <script>
    $('#keep-order').multiSelect({ keepOrder: true });
    </script>
    <script>
    $('#public-methods').multiSelect();
    $('#select-all').click(function() {
        $('#public-methods').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function() {
        $('#public-methods').multiSelect('deselect_all');
        return false;
    });
    $('#select-100').click(function() {
        $('#public-methods').multiSelect('select', ['elem_0', 'elem_1'..., 'elem_99']);
        return false;
    });
    $('#deselect-100').click(function() {
        $('#public-methods').multiSelect('deselect', ['elem_0', 'elem_1'..., 'elem_99']);
        return false;
    });
    $('#refresh').on('click', function() {
        $('#public-methods').multiSelect('refresh');
        return false;
    });
    $('#add-option').on('click', function() {
        $('#public-methods').multiSelect('addOption', { value: 42, text: 'test 42', index: 0 });
        return false;
    });
    </script>
    <script>
    $('#optgroup').multiSelect({ selectableOptgroup: true });
    </script>
    <script>
    $('#disabled-attribute').multiSelect();
    </script>
    <script>
    $('#custom-headers').multiSelect({
        selectableHeader: "<div class='custom-header'>Selectable items</div>",
        selectionHeader: "<div class='custom-header'>Selection items</div>",
        selectableFooter: "<div class='custom-header'>Selectable footer</div>",
        selectionFooter: "<div class='custom-header'>Selection footer</div>"
    });
    </script>

</body>

</html>
