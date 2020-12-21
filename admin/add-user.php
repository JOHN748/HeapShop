<!-- Functions -->
<?php include ('../functions/functions.php'); ?>
<!-- Admin Session -->
<?php include ('includes/session.php'); ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>
    <!-- Website Title -->
    <title>Add User</title>
    <!-- Meta Tags -->
    <?php include 'includes/header/meta-tags.php'; ?>
    <!-- Default CSS -->
    <?php include '../includes/header/header-styles.php'; ?>
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
                            <h4 class="mb-0 font-size-18">Add User</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Add User</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End content Title -->

                <!-- Content -->
                <div class="container p-2 mt-4">
                    <form class="form-horizontal" method="post" action="add-user.php" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label for="useremail">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?php echo $username; ?>">
                                    <span class="text-danger"><?php echo $username_error; ?></span>
                                </div>        
                            </div>

                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
                                    <span class="text-danger"><?php echo $email_error; ?></span>
                                </div>
                            </div>                        

                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" name="password_1" placeholder="Enter password">
                                    <span class="text-danger"><?php echo $password_1_error; ?></span>
                                </div>                            
                            </div>

                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label for="userpassword">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_2" placeholder="Enter password">
                                    <span class="text-danger"><?php echo $password_2_error; ?></span>
                                </div>                            
                            </div>

                            <div class="col-6 mt-4">
                                <div class="form-group">
                                    <label>User Type</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="customer">Customer</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>                            
                            </div>

                            <div class="col-6 mt-4">
                                <label>Upload Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="user_image" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <span class="text-danger"><?php echo $user_image_error; ?></span>
                                </div>                            
                            </div>

                        </div>

                        <div class="mt-4 text-center">
                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="add_user" style="width: 30%;">
                                Register
                            </button>
                        </div>

                    </form>
                </div>
                <!-- End Content -->

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

<!-- Form JS -->
<script src="assets/libs/form-element/file-input.js"></script>
<script src="assets/libs/form-element/form-element.js"></script>

</body>
</html>