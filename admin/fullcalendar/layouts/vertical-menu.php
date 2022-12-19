<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="fullcalendar/index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="../images/logo.png" alt="" height="25" > 
                    </span>
                    <span class="logo-lg">
                        <img src="../images/logo.png" alt="" height="25"> <span class="logo-txt font-size-13" style="color: #2733a0"><b><!-- + --></b></span>
                    </span>
                </a>

                <a href="fullcalendar/index.php" class="logo logo-light"> 
                    <span class="logo-sm">
                        <img src="../images/logo.png" alt="" height="25"> <span class="logo-txt">
                    </span>
                    <span class="logo-lg">
                        <img src="../images/logo.png" alt="" height="25"> <span class="logo-txt"><b><!-- SAN LUCAS LABLINE --></b></span>
                    </span>
                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

           <!-- App Search-->
             <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <!-- <input type="text" class="form-control" placeholder="<?php echo $language["Search"]; ?>">
                    <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button> --> 
                    <!-- <img src="images/sll_letters.png" height="30" class="form-control" style="background-color: white "> -->
                </div>
            </form> 
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?php echo $language["Search"]; ?>" aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="../images/profile_pic.png"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $fullname ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                   
                   <!--  <a class="dropdown-item" href="apps-contacts-profile.php"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> <?php echo $language["Profile"]; ?></a>
                    <a class="dropdown-item" href="auth-lock-screen.php"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> <?php echo $language["Lock_screen"]; ?> </a>
                    <div class="dropdown-divider"></div> -->
                <form action="logout.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $user_id ?>">
                    <button type="submit" name="btn_logout" class="dropdown-item"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> <?php echo $language["Logout"]; ?></button>
                </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?php echo $language["Menu"]; ?></li>
            <?php if($role == '1' || $role == '3') { ?>
                <li>
                    <a href="index.php">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="list"></i>
                        <span data-key="t-authentication">DORMS</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="../dorm.php" data-key="edit"><i data-feather="grid"></i>Add Dorm</a></li>
                        <li><a href="../rooms.php" data-key="t-register"> <i data-feather="book"></i>Assign Room No.</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="../rent.php">
                        <i data-feather="home"></i>
                        <span data-key="t-book">Rent</span>
                       
                    </a>
                </li>
                <li>
                    <a href="../leave.php">
                        <i data-feather="truck"></i>
                        <span data-key="t-book">Leave</span>
                       
                    </a>
                </li>
                <li>
                    <a href="../students.php">
                        <i data-feather="user"></i>
                        <span data-key="t-book">Students</span>
                       
                    </a>
                </li>
            <?php } ?>
            <?php if($role == '1') { ?>
                <li>
                    <a href="../user_management_list.php">
                        <i data-feather="users"></i>
                        <span data-key="t-reservation">User Management</span>
                    </a>
                </li> 
            <?php } ?>
                 
                <?php if($role == '2') { ?>
                <li>
                    <a href="../leave.php">
                        <i data-feather="truck"></i>
                        <span data-key="t-book">Leave</span>
                       
                    </a>
                </li> 
            <?php } ?>
                <li>
                    <a href="../chat.php">
                        <i data-feather="inbox"></i>
                        <span data-key="t-reservation">Chat</span>
                    </a>
                </li>  

            </ul>  
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->