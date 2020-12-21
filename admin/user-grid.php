<!-- Functions -->
<?php include ('../functions/functions.php'); ?>
<!-- Admin Session -->
<?php include ('includes/session.php'); ?>

<?php $userdetails = user_details(); ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>

    <!-- Website Title -->
    <title>User Grid</title>
    <!-- Meta Tags -->
    <?php include 'includes/header/meta-tags.php'; ?>
    <!-- Default CSS -->
    <?php include 'includes/header/header-styles.php'; ?>
    <!-- Datatable CSS -->
    <?php include 'includes/header/datatable-styles.php'; ?>

</head>

<!-- Body Section -->
<?php include 'includes/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- MenuBar -->
    <?php include 'includes/menu/menu.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Container -->
            <div class="container-fluid">

                <!-- Content Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">User Grid</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Manage Users</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End content Title -->

                <!-- Content Start -->
                    <div class="row"> 

                        <?php foreach ($userdetails as $key => $userdetail): ?>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                        <a class="text-body dropdown-toggle font-size-16" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="uil uil-pen mr-1"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="uil uil-user mr-1"></i> Profile</a>
                                            <a class="dropdown-item" href="#"><i class="uil uil-comment-dots mr-1"></i> Chat</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#"><i class="uil uil-trash-alt mr-1"></i>Remove</a>
                                        </div>
                                    </div>
                                    <div class="avatar-xs mr-3 float-left">
                                        
                                        <?php if ($userdetail['role'] == 'admin'): ?>    
                                            <div class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                <i class="fas fa-bolt" style="font-size: 1.2em;"></i>
                                            </div>
                                        <?php elseif ($userdetail['role'] == 'vendor'): ?>    
                                            <div class="avatar-title rounded-circle bg-soft-warning text-warning">
                                                <i class="fas fa-bolt" style="font-size: 1.2em;"></i>
                                            </div>
                                        <?php else: ?>    
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="fas fa-bolt" style="font-size: 1.2em;"></i>
                                            </div>
                                        <?php endif ?>


                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="mb-4">
                                        <div class="avatar-md rounded-circle border border-soft-dark mx-auto">

                                            <?php if ($userdetail['role'] == 'admin'): ?>
                                                <img src="<?php echo 'assets/images/admin/'.$userdetail['user_image']; ?>"
                                                alt="" class="img-thumbnail"
                                                style="border-radius: 50%; width: 100%; height: 100%;">    
                                            <?php elseif ($userdetail['role'] == 'vendor'): ?>
                                                <img src="<?php echo '../vendor/assets/images/vendor/'.$userdetail['user_image']; ?>"
                                                alt="" class="img-thumbnail"
                                                style="border-radius: 50%; width: 100%; height: 100%;">  
                                            <?php else: ?>
                                                <img src="<?php echo '../customer/assets/images/customer/'.$userdetail['user_image'];?>"
                                                alt="" class="img-thumbnail"
                                                style="border-radius: 50%; width: 100%; height: 100%;">
                                            <?php endif ?>

                                        </div>
                                    </div>
                                    <h5 class="font-size-15 mb-1"><?php echo $userdetail['username']; ?></h5>
                                    <p class="text-muted mb-2"><?php echo $userdetail['role']; ?></p>
                                    
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <h5 class="font-size-14 mb-2"><i class="fas fa-store-alt text-success mr-2"></i>Product No</h5>
                                            <h6 class="text-muted">70%</h6>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-14 mb-2"><i class="fas fa-calendar-alt text-success mr-2"></i>Joined at</h5>
                                            <h6 class="text-muted"><?php echo $userdetail['joined_at']; ?></h6>
                                        </div>  
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-top">
                                    <div class="contact-links d-flex font-size-20">
                                        <div class="flex-fill">
                                            <a href="" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                        </div>
                                        <div class="flex-fill">
                                            <a href="" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                        </div>
                                        <div class="flex-fill">
                                            <a href="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endforeach ?>

                    </div>
                
                <!-- Content End -->
                
            </div> <!-- End Page Container -->

        </div> <!-- End Page Content -->

        <!-- Footer -->
        <?php include 'includes/footer/footer.php'; ?>
        
    </div>
    <!-- End Main Content -->

</div>
<!-- End layout Wrapper -->

<!-- Right Sidebar -->
<?php include 'includes/menu/right-sidebar.php'; ?>

<!-- Default JS -->
<?php include 'includes/footer/footer-scripts.php'; ?>

<!-- Datatable JS -->
<?php include 'includes/footer/datatables-scripts.php'; ?>

</body>
</html>                       



            