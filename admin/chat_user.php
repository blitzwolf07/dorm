    <?php include 'include/connect.php'; ?>
    <?php include 'layouts/head-main.php'; ?>
    <head>
        <title>Chat | San Lucas Labline Admin & Dashboard Template</title>
        <?php include 'layouts/head.php'; ?>
        <?php include 'layouts/head-style.php'; ?>

    </head>
<style type="text/css">
.image-upload {
    width: 38px;
}
.image-upload > input
{
    display: none;
}
img {
}
.image-upload img
{    width: 20px;
    cursor: pointer;
    color: var(--white);
}
</style>
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
                                        <img src="images/profile_pic.png" class="avatar-sm rounded-circle" alt="">
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
                                <ul class="nav nav-pills nav-justified bg-soft-light p-1">
                                    <li class="nav-item">
                                        <a href="#groups" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                            <i class="bx bx-group font-size-20 d-sm-none"></i>
                                            <span class="d-none d-sm-block">Chat</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="groups">
                                        <div class="chat-message-list" data-simplebar>
                                            <div class="pt-3">
                                                <ul class="list-unstyled chat-list">
                                             <?php
                                             $id = $_GET['user_id'];
                                            $user = mysqli_query($conn,"select * from tbl_users where id = '$id'") or die (mysqli_error($conn));
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
                                                                    <h5 class="font-size-14"> <?php echo $row['full_name'] ?></h5>
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
<?php 
$user_id = $_GET['user_id'];
$chat = mysqli_query($conn,"select * from tbl_users where id = '$user_id'") or die (mysqli_error($conn));
if(mysqli_num_rows($chat) > 0){
            $row_chat = mysqli_fetch_assoc($chat);
          }else{
            header("location: chat.php");
          }

 ?>
                        <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
                            <div class="card">
                                <div class="p-3 px-lg-4 border-bottom">
                                    <div class="row">
                                        <div class="col-xl-4 col-7">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid d-block rounded-circle">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark"><?php echo $row_chat['full_name'] ?></a></h5>
                                                    <p class="text-muted text-truncate mb-0"><?php echo $row_chat['status'] ?> Now</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-5">
                                            <ul class="list-inline user-chat-nav text-end mb-0">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-search"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                                            <form class="px-2">
                                                                <div class="search">
                                                                    <input type="text" class="form-control border bg-soft-light" placeholder="Search...">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Profile</a>
                                                            <a class="dropdown-item" href="#">Archive</a>
                                                            <a class="dropdown-item" href="#">Muted</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat-conversation p-3 px-2" data-simplebar>
                                    <ul class="list-unstyled mb-0">
                                        <li class="chat-day-title">
                                            <span class="title">Today</span>
                                        </li>
                                             <div class="">
     <?php    
     $id = $_GET['user_id'];
     $outgoing_id = $_SESSION['user_id'];
     $output = "";
      $sql = "SELECT * FROM tbl_messages LEFT JOIN tbl_users ON tbl_users.id = tbl_messages.outgoing_msg_id
                WHERE (tbl_messages.outgoing_msg_id = '$outgoing_id' AND tbl_messages.incoming_msg_id = '$id')
                OR (tbl_messages.outgoing_msg_id = '$id' AND tbl_messages.incoming_msg_id = '$outgoing_id')";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)){ ?>
              <?php  if ($row['outgoing_msg_id'] === $outgoing_id) { 
       
                ?>
                     <li class="right">
                                <div class="conversation-list">
                                         <div class="ctext-wrap">
                                             <div class="ctext-wrap-content">
                                                    <h5 class="conversation-name"><a href="#" class="user-name"><?php echo $row['full_name'] ?> <?php echo date("h:iA",strtotime($row['date_time'])) ?></span></h5>
                                                    <p class="mb-0 text-dark"><?php echo $row['msg'] ?> </p>
                                        <?php if($row['images'] == '') { ?>

                                        <?php }else { ?>
                                                <a class="d-inline-block m-1" href="">
                                                    <img src="student_id/<?php echo $row['id_picture'] ?>" alt="" class="rounded img-thumbnail" width="100">
                                                </a>
                                                
                                        <?php } ?>
                                        <br>
                                                    <h5 class="conversation-name float-end"><span class="time"><?php echo date("M. d, y",strtotime($row['date_time'])) ?></span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
             <?php }else { ?> 
                                <li class="left">
                                    <div class="conversation-list right">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <h5 class="conversation-name"><a href="#" class="user-name"><?php echo $row['full_name'] ?></a> <span class="time"><?php echo date("h:iA",strtotime($row['date_time'])) ?>'</span></h5>
                                   <p class="mb-0 text-white"><?php echo $row['msg'] ?> </p>
                                     <?php if($row['images'] == '') { ?>

                                        <?php }else { ?>
                                                <a class="d-inline-block m-1" href="">
                                                    <img src="student_id/<?php echo $row['id_picture'] ?>" alt="" class="rounded img-thumbnail" width="100">
                                                </a>
                                        <?php } ?>
                                                <br>    
                                        <h5 class="conversation-name float-end"><span class="time"><?php echo date("M. d, y",strtotime($row['date_time'])) ?></span></h5>
                                                </div>
                                            </div>
                                        </div>
                                </li>
              <?php } ?>
         <?php  } ?>
     <?php   }else{
 $output .= '<div class="text-center"><p>No messages are available. Once you send message they will appear here.</p></div>';
        }
    
        ?>
                                            </div>
                                    </ul>
                                </div>
                        <form action="chat_send_add.php" class="typing-area" method="post"  enctype="multipart/form-data">
                            <input type="hidden" name="admin_id" value="<?php echo $id ?>">
                                <div class="p-3 border-top">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="position-relative">
                                                <input type="text" name="message" id="file-input" class="form-control border bg-soft-light input-field" placeholder="Enter Message..." autocomplete="off" onfocus="this.value=''" >
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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