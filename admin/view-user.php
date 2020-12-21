<!-- Functions -->
<?php include ('../functions/functions.php'); ?>
<!-- Admin Session -->
<?php include ('includes/session.php'); ?>

<?php $user_pdetails = user_pdetails(); ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>
    <!-- Website Title -->
    <title>Admin-Dashboard</title>
    <!-- Meta Tags -->
    <?php include 'includes/header/meta-tags.php'; ?>
    <!-- Default CSS -->
    <?php include 'includes/header/header-styles.php'; ?>
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
                            <h4 class="mb-0 font-size-18">Dashboard</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End content Title -->

                <!-- Notification Message -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <script>
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3500,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })
                         
                        Toast.fire({
                          icon: 'success',
                          title: '<?php echo $_SESSION['success']; ?>'
                        })
                    </script>
                    <?php unset($_SESSION['success']); ?>
                <?php endif ?>

                <!--Main Content -->

                <div class="row">
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mt-3 mb-4">
                                    <div class="avatar-xl rounded-circle p-1 border border-soft-primary mx-auto">
                                        <?php if ($view_role == 'admin'): ?>                                       
                                            <img src="assets/images/admin/<?php echo $view_user_image ?>" alt="" style="width: 100%; height: 100%; border-radius: 50%;">
                                        <?php elseif ($view_role == 'vendor'): ?>                                       
                                            <img src="../vendor/assets/images/vendor/<?php echo $view_user_image ?>" alt="" style="width: 100%; height: 100%; border-radius: 50%;">
                                        <?php else: ?>                                       
                                            <img src="../customer/assets/images/customer/<?php echo $view_user_image ?>" alt="" style="width: 100%; height: 100%; border-radius: 50%;">
                                        <?php endif; ?>
                                    </div>
                                    <h5 class="mt-4 mb-2"><?php echo $view_username; ?></h5>
                                    <p class="text-muted"><i class="icon-xs mr-1 icon" data-feather="monitor"></i> <?php echo $view_role; ?></p>
                                </div>
                                <div class="row justify-content-center mt-4 pt-2">
                                    <div class="col-3">
                                        <a href="#">
                                            <div class="avatar mx-auto">
                                                <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                    <i class="icon-sm" data-feather="mail"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#">
                                            <div class="avatar mx-auto">
                                                <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                    <i class="icon-sm" data-feather="phone"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#">
                                            <div class="avatar mx-auto">
                                                <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                    <i class="icon-sm" data-feather="globe"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Projects</h4>

                                <h5 class="mb-2">UI/UX Design Updates</h5>
                                <p class="text-muted">Reached 20,450 sales</p>
                                <div class=" mt-4">
                                    <h6 class="mb-0 float-right">70/100</h6>
                                    <h6 class="mb-3"><i class="icon-xs icon text-muted mr-1" data-feather="list"></i>Progress</h6>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row align-items-center my-4">
                                    <div class="col-6">
                                        <span class="bg-soft-primary d-inline-block px-2 py-1 border border-soft-primary rounded text-primary">15th Oct, 2020</span>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-inline text-right mb-0">
                                            <li class="list-inline-item mr-1">
                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded">
                                            </li>
                                            <li class="list-inline-item mr-1">
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded">
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <div class="avatar-xs">
                                                        <span class="avatar-title rounded bg-soft-primary font-size-15 text-primary">5+</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-center mt-4">
                                    <div class="col-4">
                                        <h5 class="mb-1">5.2M</h5>
                                        <p class="text-muted mb-0">Followers</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="mb-1">10.5K</h5>
                                        <p class="text-muted mb-0">Following</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="mb-1">5.8K</h5>
                                        <p class="text-muted mb-0">Shot</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar mr-3">
                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                            <i class="icon-sm" data-feather="layout"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-size-15 my-1">Admin Projects</h5>
                                        <p class="text-muted font-size-14 mb-2">UI/UX Design</p>
                                        <p class="text-muted mb-0">Itaque earum rerum hic tenetur a sapiente delectus.</p>
                                    </div>
                                    <a href="#">
                                        <div class="dropdown">
                                            <a class="text-body dropdown-toggle font-size-20" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                                              <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar mr-3">
                                        <div class="avatar-title rounded-circle bg-soft-success text-success">
                                            <i class="icon-sm" data-feather="globe"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-size-15 mb-1">Freelancer Work</h5>
                                        <p class="text-muted font-size-14 mb-2">UI/UX Design</p>
                                        <p class="text-muted mb-0">Itaque earum rerum hic tenetur a sapiente delectus.</p>
                                    </div>
                                    <a href="#">
                                        <div class="dropdown">
                                            <a class="text-body dropdown-toggle font-size-20" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                                              <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-7">
                                                <h4 class="mb-1"><?php echo $total_product_count; ?></h4>
                                                <p class="text-muted mb-4">Total Products</p>
                                                <p class="text-muted mb-0"><i class="icon-xs text-success mr-2" data-feather="trending-up"></i>65.40%</p>
                                            </div>
                                            <div class="col-5">
                                                <div>
                                                    <div class="apex-charts" id="sparkline-chart-1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-7">
                                                <h4 class="mb-1"><?php echo $active_product_count; ?></h4>
                                                <p class="text-muted mb-4">Active Products</p>
                                                <p class="text-muted mb-0"><i class="icon-xs text-danger mr-2" data-feather="trending-down"></i>30.12%</p>
                                            </div>
                                            <div class="col-5">
                                                <div>
                                                    <div class="apex-charts" id="sparkline-chart-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-7">
                                                <h4 class="mb-1"><?php echo $inactive_product_count; ?></h4>
                                                <p class="text-muted mb-4">Inactive Products</p>
                                                <p class="text-muted mb-0"><i class="icon-xs text-success mr-2" data-feather="trending-up"></i>78.45%</p>
                                            </div>
                                            <div class="col-5">
                                                <div>
                                                    <div class="apex-charts" id="sparkline-chart-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-5">Productivity</h4>
                                <div>
                                    <div class="apex-charts" id="column-chart-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <h4 class="card-title mb-4">Recent Products</h4>

                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <thead class="thead-light">
                                                    <th scope="col">Product Image</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                </thead>
                                                <tbody>
                                            
                                                <?php foreach ($user_pdetails as $key => $user_pdetail): ?>
                                                <tr>
                                                    <td><?php echo $user_pdetail['featured_image'];?></td>
                                                    <td><?php echo $user_pdetail['product_name'];?></td>
                                                    <td><?php echo $user_pdetail['price'];?></td>
                                                    <td>
                                                        <?php if($user_pdetail['status'] == 1):?>
                                                            <span class="text-success">Active</span>
                                                        <?php else: ?>
                                                            <span class="text-danger">Inactive</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?php echo $user_pdetail['added_on'];?></td>
                                                </tr>
                                                <?php endforeach ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
                
            </div>
            <!-- End Page Container -->
        </div>
        <!-- End Page Content -->
        <?php include 'includes/footer/footer.php'; ?>
    </div>
    <!-- End Main Content -->

</div>
<!-- End layout Wrapper -->

<!-- Right Sidebar -->
<?php include 'includes/menu/right-sidebar.php'; ?>

<!-- Default JS -->
<?php include 'includes/footer/footer-scripts.php'; ?>

</body>
</html>