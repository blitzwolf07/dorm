
 <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="select * from tbl_dorm";
$results = $db_handle->runQuery($query);
 ?>
 <script type="text/javascript" src="jquery.min.js"></script> 
 <script type="text/javascript">
   function get_dorm(val) {
    $.ajax({
      type: "POST",
      url: "get_dorm.php",
      data: 'id='+val,
      success: function(data) {
        $("#room_list").html(data);
      }
    });
   }
   function get_room(val) {
    $.ajax({
      type: "POST",
      url: "get_room_no.php",
      data: 'id='+val,
      success: function(data) {      
        $("#room_id").val(data);

      }
    });
   }
 </script>
<head>

    <title>Admin Login | San Lucas Labline</title>
    <?php include 'layouts/head.php'; ?>

    <?php include 'layouts/head-style.php'; ?>

    <link rel="stylesheet" href="assets/css/style.css">
        <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <style>
        .logo-txt {
        border-bottom: 1px solid black;
    }
    </style>
</head>
<?php include 'layouts/body.php'; ?>
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-6 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-0 text-center">
                                <a href="#" class="d-block auth-logo">
                                    <img src="images/logo.png" alt="" height="80"><!--  <span class="logo-txt">SAN LUCAS LABLINE</span> -->
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Welcome Back !</h5>
                                    <p class="text-muted mt-2">Sign in to continue to CLSU Dormitory Management System.</p>
                                </div>
                                <form class="custom-form mt-4 pt-2" action="signup.php" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                        <label class="form-label" for="username">Full Name</label>
                                        <input type="text" class="form-control" id="full_name" placeholder="Enter Fullname" name="full_name" >
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="form-label" for="username">Home Address</label>
                                        <input type="text" class="form-control" id="home_address" placeholder="Enter Home Address" name="home_address" >
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                        <label class="form-label" for="username">Dorm Name</label>
                                        <select name="dorm_id" id="building-list" class="form-control" onChange="get_dorm(this.value);" required>
                                        <option selected disabled>Select Dorm</option>
                                        <?php
                                        foreach($results as $dorm) {
                                         ?>
                                         <option value="<?php echo $dorm['id']; ?>"><?php echo $dorm['dorm_name'] ?></option>
                                        <?php } ?>
                                        </select>
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="form-label" for="username">Room Number</label>
                                         <select name="room_id" id="room_list" class="form-control" onChange="get_room(this.value);">
                                    <option value=""> Select Room No.</option>
                                    </select>
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                        <label class="form-label" for="username">Course & Year</label>
                                        <input type="text" class="form-control" id="course_year" placeholder="Enter Course & Year" name="course_year" >
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="form-label" for="username">ID Picture</label>
                                        <input type="file" class="form-control" id="id_picture"  name="id_picture" >
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                        <label class="form-label" for="username">Contact Number</label>
                                        <input type="text" class="form-control" id="contact_number" placeholder="Enter Contact Number" name="contact_number" >
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="form-label" for="username">Emergency Contact No.</label>
                                        <input type="text" class="form-control" id="emergency_contact_no" placeholder="Enter Emergency Contact No." name="emergency_contact_no" >
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                        <label class="form-label" for="username">Emergency Emaill Address</label>
                                        <input type="email" class="form-control" id="email_add" placeholder="Enter Email Address" name="email_add" >
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label class="form-label" for="username">ID Number</label>
                                        <input type="text" class="form-control" id="id_number"  name="id_number" >
                                        <span class="text-danger"><!-- <?php echo $username_err; ?> --></span>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <div class="">
                                                    <a href="auth-recoverpw.php" class="text-muted">Forgot password?</a>
                                                </div>
                                            </div>
 -->                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Enter password" name="password" aria-label="Password" aria-describedby="password-addon">
                                            <span class="text-danger"><!-- <?php echo $password_err; ?> --></span>
                                            <button class="btn btn-light ms-0" type="button" id="password-addon" name="password"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                </div>  
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                <label class="form-check-label" for="remember-check">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" name="btn_register">Register</button>
                                    </div>
                                </form>

                                 <div class="mt-4 pt-2 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="font-size-14 mb-3 text-muted fw-medium">- Back to <a href="index.php"> Login</a> -</h5>
                                    </div>

                                  <!--  <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook">Student</i>
                                            </a>
                                        </li>
                                         <li class="list-inline-item">
                                            <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void()" class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li> 
                                    </ul>-->
                                </div> 

                                <!-- <div class="mt-5 text-center">
                                    <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.php" class="text-primary fw-semibold"> Signup now </a> </p>
                                </div> -->
                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> San Lucas Labline Company.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-6 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex" style="background-image: url('images/clsu.jpg');">
                    <div class="bg-overlay bg-primary"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                  <!--   <div class="row justify-content-center align-items-center">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div> -->
                                    <!-- end carouselIndicators -->
                                    <!-- <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Blah blah blah blah blah Blah blah blah blah blah Blah blah blah blah blah Blah blah blah blah blah”
                                                </h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-1.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">......
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Admin</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Blah blah blah blah blah Blah blah blah blah blah Blah blah blah blah blah Blah blah blah blah blah.”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-2.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">.......
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Admin</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Blah blah blah blah blah Blah blah blah blah blah Blah blah blah blah blah Blah blah blah blah blah”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <img src="assets/images/users/avatar-3.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                        <div class="flex-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">......</h5>
                                                            <p class="mb-0 text-white-50">Admin Staff
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- end carousel-inner -->
                              <!--   </div> -->
                                <!-- end review carousel -->
                        <!--     </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->
<!-- Sweet alert -->
<?php include 'include/script.php'; ?>

<?php include 'layouts/vendor-scripts.php'; ?>
<!-- password addon init -->
<script src="assets/js/pages/pass-addon.init.js"></script>

</body>

</html>