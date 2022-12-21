<?php 
include 'include/connect.php';
 ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>Applicants | San Lucas Labline</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

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
                            <h4 class="mb-sm-0 font-size-25">Applicants Record</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Applicants</li>
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
                                <div class="row">
                                    <div class="col-md-10">
                                        <h4 class="mb-sm-0 font-size-15">List of Applicants</h4>
                                    </div>
                                    <div class="col-md-2 float-end">
                                         <button type="button" class="btn btn-danger waves-effect btn-label waves-light float-end" data-bs-toggle="modal" data-bs-target="#remove"><i class="bx bx-trash label-icon"></i>Remove All</button>
                                    </div>
                                </div>
                            </div>
                    <?php include 'applicant_remove_modal.php'; ?>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Applicant Name</th>
                                            <th>Contact No.</th>
                                            <th>Email</th>
                                            <th>Position Applied</th>
                                            <th>Date Submitted</th>
                                            <th>CV/Resume</th>
                                            <th>Status</th>
                                        <?php if($role == '5') { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $page = 'applicant';
                                    $applicant = mysqli_query($conn,"select * from tbl_applicant order by status = 'Pending' desc") or die (mysqli_error($conn)) or die (mysqli_error($conn));
                                    while($row_applicant = mysqli_fetch_assoc($applicant)) {
                                        $id = $row_applicant['id'];
                                     ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row_applicant['fname'] ?> <?php echo $row_applicant['lname'] ?></td>
                                            <td><?php echo $row_applicant['contact_number'] ?></td>
                                            <td><?php echo $row_applicant['email'] ?></td>
                                            <td><?php echo $row_applicant['position'] ?></td>
                                            <td><?php echo date("M. d, Y",strtotime($row_applicant['date'])) ?></td>
                                            <td><a href="hiring_files/<?php echo $row_applicant['resume'] ?>" target="_blank"><span class="badge bg-primary text-whites ms-1  font-size-12"><i class="bx bx-download label-icon"></i> Download</span>
                                                </a></td>
                                            <td>
                                                <?php if($row_applicant['status']=='Pending') { ?>
                                                    <span class="badge bg-warning text-white ms-1  font-size-12"><?php echo $row_applicant['status'] ?></span>
                                                    <?php }else { ?>
                                                    <span class="badge bg-info text-white ms-1  font-size-12"><?php echo $row_applicant['status'] ?></span>
                                                        <?php } ?></td>
                                    <?php if($role == '5') { ?>
                                            <td>
                                     <form action="applicant_receive.php" method="post">
                                        <div class="btn-group" role="group">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <a href="applicant_receive.php?id=<?php echo $id ?>" class="btn btn-info waves-effect btn-label waves-light"><i class="fa fa-thumbs-up label-icon font-size-13"></i>Receive</a>
                                            <button type="button" class="btn btn-danger waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id ?>"><i class="bx bx-trash label-icon"></i>Delete</button>
                                        </div>
                                        </form> 
                                            </td>
                                    <?php } ?>
                                        </tr>
                                    <?php
                                    include 'deleteModal.php';
                                } ?>

                                    </tbody>
                                </table>            
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div><!-- End Page-content -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $('#select2').select2();
</script>    

</body>

</html>