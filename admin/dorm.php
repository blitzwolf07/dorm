<?php include 'include/connect.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<head>
    <title>Dorm's | CLSU Dormitory Management System</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style type="text/css">
    table,thead,tbody,tr,td {
        vertical-align: middle;
    }
    </style>
    
    <?php include 'layouts/head-style.php'; ?>

</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-25">Dorm Record</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Dorm</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <?php if($role == '1') { ?>
                                     <div class="float-start gap-2">
                                            <button type="button" class="btn btn-primary waves-effect btn-label waves-light"  data-bs-toggle="modal" data-bs-target=".book"><i class="bx bx-plus-circle label-icon"></i>Add Dorm</button>
                                    </div>
                                <?php } ?>
                                        <?php include 'dorm_add_modal.php'; ?>

                                <?php if($role == '2') { ?>
                                     <h4 class="mb-sm-0 font-size-15">List of dorms</h4>
                                <?php } ?>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Dorm Name</th>
                                            <th>Number's of Room</th>
                                            <th>Date Added</th>
                                        <?php if($role == '1') { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                        </tr>
                                    </thead>


                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $page = 'dorm';
                                    $dorm = mysqli_query($conn,"select * from tbl_dorm") or die (mysqli_error($conn));
                                    while($row_dorm = mysqli_fetch_assoc($dorm)) {
                                        $id = $row_dorm['id'];
                                     ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row_dorm['dorm_name']?></td>
                                            <td><?php echo $row_dorm['number_rooms']?></td>
                                            <td><?php echo date("F d, Y",strtotime($row_dorm['date_added'])) ?></td>
                                        <?php if($role == '1') { ?>
                                            <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-success waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id ?>"><i class="bx bx-edit label-icon"></i>Edit</button>
                                                <button type="button" class="btn btn-danger waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id ?>"><i class="bx bx-trash label-icon"></i>Delete</button>
                                            </div>  
                                            </td>
                                        <?php } ?>
                                        </tr>
                                    <?php
                                    include 'deleteModal.php';
                                    include 'dorm_edit_modal.php'; 
                                } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Sweet alert -->
<?php include 'include/script.php'; ?>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/pages/form-validation.init.js"></script>
<!-- ckeditor -->
<script src="assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<!-- init js -->
<script src="assets/js/pages/form-editor.init.js"></script>

</body>

</html>