    <?php include 'include/connect.php'; ?>
    <?php include 'layouts/head-main.php'; ?>
    <?php 
        $users = mysqli_query($conn,"select * from tbl_users where id = '$user_id'") or die (mysqli_error($conn));
        $user = mysqli_fetch_assoc($users);

        $fullname = $user['full_name'];
        $status = $user['status'];
        $dorm_id = $user['dorm_id'];
    ?>
    <head>
        <title>Chat | CLSU DORMITORY MANAGEMENT SYSTEM</title>
        <?php include 'layouts/head.php'; ?>
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
                                <h4 class="mb-sm-0 font-size-18">Chat</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                        <li class="breadcrumb-item active">Chat</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="d-lg-flex">
                        <div class="chat-leftsidebar card">
                            <div class="p-3 px-4 border-bottom">
                                <div class="d-flex align-items-start ">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle" alt="">
                                    </div>

                                    <div class="flex-grow-1">
                                        <h5 class="font-size-16 mb-1"><a href="#" class="text-dark"><?php echo $fullname ?> <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>
                                        <p class="text-muted mb-0"><?php echo $status ?></p>
                                    </div>

                                    <div class="flex-shrink-0">
                                        <div class="dropdown chat-noti-dropdown">
                                            <button class="btn dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Profile</a>
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Add Contact</a>
                                                <a class="dropdown-item" href="#">Setting</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-leftsidebar-nav">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="groups">
                                        <div class="chat-message-list" data-simplebar>
                                            <div class="pt-3">
                                                <div class="px-3">
                                                    <h5 class="font-size-14 mb-3">Groups</h5>
                                                </div>
                                                <ul class="list-unstyled chat-list">
             <?php

                                  
                                        if($role == '1') {
                                            $user = mysqli_query($conn,"select * from tbl_users where role_id !=1") or die (mysqli_error($conn));
                                        }elseif ($role == '3') {
                                            $user = mysqli_query($conn,"SELECT * from tbl_users where role_id = 2 AND dorm_id = '$dorm_id'") or die (mysqli_error($conn));
                                        }
                                        elseif ($role == '2') {
                                            $user = mysqli_query($conn,"select * from tbl_users where role_id = 1") or die (mysqli_error($conn));
                                        }
                                            while($row  = mysqli_fetch_assoc($user)) {
                                             ?>
                                                    <li>
                                                        <a href="chat_user.php?user_id=<?php echo $row['id'] ?>">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-sm me-3">
                                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                        A
                                                                    </span>
                                                                </div>
                                                                
                                                    <div class="flex-grow-1">
                                                                    <h5 class="font-size-14 mb-0"> <?php echo $row['full_name'] ?></h5>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end chat-leftsidebar -->

                        <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
                            <div class="card">
                                <div class="p-4 px-lg-4 border-bottom">
                                    <div class="row">
                                        <div class="col-xl-4 col-7">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 me-3 d-sm-block d-none">
                                                    <!-- <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid d-block rounded-circle"> -->
                                                    <h5 class="font-size-15 mb-1 text-truncate"><a href="#" class="text-dark">This chat is exclusive for CLSU DORMITORY</a></h5>
                                                </div>
                                                <!-- <div class="flex-grow-1">
                                                    
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat-conversation p-3 px-2" data-simplebar>
                                    <ul class="list-unstyled mb-0">
                                        <li class="chat-day-title">
                                            <span class="title">Click the user in inbox to start the conversation</span>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end user chat -->
                    </div>
                    <!-- End d-lg-flex  -->

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
    <script src="javascript/chat.js"></script>
    <script src="javascript/users.js"></script>
    <script src="assets/js/app.js"></script>

    </body>

    </html>