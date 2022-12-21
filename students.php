<?php 
include 'include/connect.php';
 ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>Students | CLSU Dormitory Management System</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
                            <h4 class="mb-sm-0 font-size-25">Students Record</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Students</li>
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
                                <div class="float-start gap-0">
                                           <!--  <button type="button" class="btn btn-primary waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target=".user"><i class="bx bx-plus-circle label-icon"></i>Add User</button> -->
                                        <h4 class="card-title">List of Students</h4>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                            <div>
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="user_management_list.php" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="user_management_grid.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid"><i class="bx bx-grid-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Picture</th>
                                            <th>ID No.</th>
                                            <th>Full Name</th>
                                            <th>Home address</th>
                                            <th>Dorm Name</th>
                                            <th>Room No.</th>
                                            <th>Course & Year</th>
                                            <th>Contact No.</th>
                                            <th>Emergency No.</th>
                                            <th>Status</th>
                                            <th>Active Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $page = 'students';
                                    $users = mysqli_query($conn,"select * from tbl_users where role_id = '2' AND dorm_id = '$dorm_id' ") or die (mysqli_error($conn)) or die (mysqli_error($conn));
                                    while($row_users = mysqli_fetch_assoc($users)) {
                                        $id = $row_users['id'];

                                    $role = mysqli_query($conn,"select * from tbl_role where id = '".$row_users['role_id']."'") or die (mysqli_error($conn));
                                    $row_role = mysqli_fetch_assoc($role);

                                    $dorm = mysqli_query($conn,"select * from tbl_dorm") or die (mysqli_error($conn));
                                    $row_dorm = mysqli_fetch_assoc($dorm);

                                    $room_no = mysqli_query($conn,"select * from tbl_rooms where dorm_id  = '".$row_dorm['id']."'") or die (mysqli_error($conn));
                                    $row_room_no = mysqli_fetch_assoc($room_no);
                                     ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td>
                                        <?php if($row_users['id_picture']=='') {
                                         ?>
                                         <a target="_blank" href="student_id/default_pic.png"><img src="default_pic/default_pic.png" height="50"></a>
                                     <?php }else { ?>
                                            <a target="_blank" href="student_id/<?php echo $row_users['id_picture'] ?>"><img src="student_id/<?php echo $row_users['id_picture'] ?>" height="50"></a>
                                     <?php } ?>
                                            </td>
                                            <td><?php echo $row_users['id_number'] ?></td>
                                            <td><?php echo $row_users['full_name'] ?></td>
                                            <td><?php echo $row_users['home_address'] ?></td>
                                            <td><?php echo $row_dorm['dorm_name'] ?></td>
                                            <td><?php echo $row_room_no['room_number'] ?></td>
                                            <td><?php echo $row_users['course_year'] ?></td>
                                            <td><?php echo $row_users['contact_number'] ?></td>
                                            <td><?php echo $row_users['emergency_contact_no'] ?></td>
                                            <td>
                                                <?php if($row_users['status'] == 'Pending') { ?>
                                                    <span class="badge bg-warning"> Pending</span>
                                                <?php }elseif ($row_users['status'] == 'Approved') { ?>
                                                    <span class="badge bg-primary"> Approved</span>
                                               <?php }else { ?>
                                                    <span class="badge bg-danger"> Rejected</span>
                                               <?php } ?>
                                            </td>
                                            <td>
                                                 <?php if($row_users['status_activate'] == 'Inactive') { ?>
                                                    <span class="badge bg-warning"> Inactive</span>
                                                <?php }else { ?>
                                                    <span class="badge bg-primary"> Active</span>
                                               <?php } ?>
                                            </td>
                                            <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-info waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#status<?php echo $id ?>"><i class="bx bx-change label-icon"></i>Change Status</button>
                                    <?php if($row_users['status_activate'] == 'Inactive') { ?>
                                        <form action="deactivate_add.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <input type="hidden" name="status_activate" value="Active">
                                            <button type="submit" class="btn btn-warning waves-effect btn-label waves-light"><i class="bx bx-like label-icon"></i>Active</button>
                                        </form>
                                       <?php }else { ?>
                                        <form action="deactivate_add.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <input type="hidden" name="status_activate" value="Inactive">
                                            <button type="submit"  class="btn btn-warning waves-effect btn-label waves-light"><i class="bx bx-like label-icon"></i>Inactive</button>
                                        </form>
                                        <?php } ?>
                                        
                                            <button type="button" class="btn btn-danger waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id ?>"><i class="bx bx-trash label-icon"></i>Delete</button>   
                                        </div>
                                            </td>
                                        </tr>
                                    <?php 
                                    include 'student_change_status.php';
                                    include 'deleteModal.php';
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


<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweetalert.init.js"></script>

<?php include 'sweetalert/sweetalert.php'; ?>

<?php include 'include/script.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $('#select2').select2();
</script>    

</body>

</html>