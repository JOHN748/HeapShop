<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo/logo-01.svg" alt="" height="30">
                                </span>
                    <span class="logo-lg">
                                    <img src="assets/images/logo/logo-title.png" alt="" height="34">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="px-lg-2">
                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/github.png" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                    <span>Mail Chimp</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/slack.png" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge badge-danger badge-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0">Notifications</h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small">View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your Order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Languages Grammer</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3_min_ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <img src="assets/images/users/avatar-3.jpg"
                                     class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Simplified English</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1_hrs_ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> View_More
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <?php  if (isset($_SESSION['user'])){ ?>

                    <?php if($_SESSION['user']['role'] == 'admin') { ?>
                        <img class="rounded-circle header-profile-user" src="<?php echo 'admin/assets/images/admin/'.$log_userimage; ?>">
                        <span class="d-none d-xl-inline-block ml-1"><?php echo $log_username; ?></span>
                    <?php }elseif($_SESSION['user']['role'] == 'vendor') { ?>
                        <img class="rounded-circle header-profile-user" src="<?php echo 'vendor/assets/images/vendor/'.$log_userimage; ?>">
                        <span class="d-none d-xl-inline-block ml-1"><?php echo $log_username; ?></span>
                    <?php }elseif($_SESSION['user']['role'] == 'customer') { ?>
                        <img class="rounded-circle header-profile-user" src="<?php echo 'customer/assets/images/customer/'.$log_userimage; ?>">
                        <span class="d-none d-xl-inline-block ml-1"><?php echo $log_username; ?></span>
                    <?php } ?>

                <?php } ?>

                <?php if (!isset($_SESSION['user'])){ ?>
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar.png">
                    <span class="d-none d-xl-inline-block ml-1">Guest</span>
                <?php } ?>

                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-right">

                    <?php  if (isset($_SESSION['user'])){ ?>

                        <?php if($_SESSION['user']['role'] == 'admin') { ?>
                            <a class="dropdown-item" href="admin/view-user.php?user=<?php echo $log_username; ?>"><i class="fa fa-user-alt mr-2"></i>Profile</a>
                        <?php }elseif($_SESSION['user']['role'] == 'vendor') { ?>
                            <a class="dropdown-item" href="vendor/userprofile.php"><i class="fa fa-user-alt mr-2"></i>Profile</a>
                        <?php }elseif($_SESSION['user']['role'] == 'customer') { ?>
                            <a class="dropdown-item" href="customer/user-profile.php"><i class="fa fa-user-alt mr-2"></i>Profile</a>
                        <?php } ?>

                    <?php } ?>


                    <?php  if (isset($_SESSION['user'])){ ?>

                        <?php if($_SESSION['user']['role'] == 'admin') { ?>
                            <a class="dropdown-item" href="admin/index.php"><i class="fa fa-tachometer-alt mr-2"></i>Dashboard</a>
                        <?php }elseif($_SESSION['user']['role'] == 'vendor') { ?>
                            <a class="dropdown-item" href="vendor/index.php"><i class="fa fa-tachometer-alt mr-2"></i>Dashboard</a>
                        <?php }elseif($_SESSION['user']['role'] == 'customer') { ?>
                            <a class="dropdown-item" href="customer/index.php"><i class="fa fa-tachometer-alt mr-2"></i>Dashboard</a>
                        <?php } ?>

                    <?php } ?>
                
                    <a class="dropdown-item" href="#"><i class="fa fa-shopping-cart mr-2"></i>My Cart<span class="badge badge-success float-right">11</span></a>
                    
                    <a class="dropdown-item d-block" href="#"><i class="fa fa-wrench mr-2"></i> Settings</a>
                    <div class="dropdown-divider"></div>

                    <?php  if (isset($_SESSION['user'])) : ?>
                    <a class="dropdown-item text-danger" href="index.php?logout='1'"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                    <?php endif ?>

                    <?php  if (!isset($_SESSION['user'])) : ?>
                    <a class="dropdown-item text-danger" href="login.php"><i class="fas fa-sign-in-alt mr-2 text-danger"></i>Login</a>
                    <?php endif ?>

                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header> <!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">02</span>
                        <span>Dashboards</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index.php">Default</a></li>
                        <li><a href="dashboard-saas.php">Sass</a></li>
                    </ul>
                </li>

                <li class="menu-title">Apps</li>

                <li>
                    <a href="calendar.php" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages/products.php">Products</a></li>
                        <li><a href="pages/add-product.php">Add Product</a></li>
                        <li><a href="pages/manage-products.php">Manage Products</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages/categories.php">Categories</a></li>
                        <li><a href="pages/add-category.php">Add Category</a></li>
                        <li><a href="pages/manage-categories.php">Manage Categories</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-rectangle"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="create-users.php">Add Users</a></li>
                        <li><a href="pages/vendor-grid.php">Manage Users</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>View Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages/admin-grid.php">Admin Grid</a></li>
                        <li><a href="pages/vendor-grid.php">Vendor Grid</a></li>
                        <li><a href="pages/User-grid.php">Customer Grid</a></li>
                        <li><a href="pages/Admin-list.php">Admin List</a></li>
                        <li><a href="pages/Vendor-list.php">Vendor List</a></li>
                        <li><a href="pages/User-list.php">Customer List</a></li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->