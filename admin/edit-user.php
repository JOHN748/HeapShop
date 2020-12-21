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
    <title>Edit Users</title>
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
                            <h4 class="mb-0 font-size-18">Edit User</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Edit User</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End content Title -->

                <!-- Main Content -->
                <div class="container p-2 mt-4">

                    <span class="text-danger" style="text-align: center;"><?php echo $err_msg; ?></span>

                    <form class="form-horizontal" method="post" action="edit-user.php" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-12" align="center">
                                <?php if ($set_role == 'admin'): ?> 
                                    <img src="<?php echo 'assets/images/admin/'.$set_user_image; ?>"
                                    style="width: 100px; height: 100px; border-radius: 4px;">    
                                <?php elseif ($set_role == 'vendor'): ?>
                                    <img src="<?php echo '../vendor/assets/images/vendor/'.$set_user_image; ?>"
                                    style="width: 100px; height: 100px; border-radius: 4px;">  
                                <?php else: ?>
                                    <img src="<?php echo '../customer/assets/images/customer/'.$set_user_image;?>"
                                    style="width: 100px; height: 100px; border-radius: 4px;">
                                <?php endif ?>
                            </div>

                            <div class="col-md-6 mt-4 text-center">
                                <div class="form-group">
                                    <label class="contol-label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?php echo $set_username; ?>" disabled>
                                    <span class="text-danger"><?php echo $username_error; ?></span>
                                </div>        
                            </div>

                            <div class="col-md-6 mt-4 text-center">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $set_email; ?>" disabled>
                                    <span class="text-danger"><?php echo $email_error; ?></span>
                            </div>                        

                            <div class="col-6 mt-4" style="display: none;">
                                <input type="text" name="user_image" value="<?php echo $set_user_image; ?>">
                                <input type="text" name="user_role" value="<?php echo $set_role; ?>">             
                            </div>

                            <div class="col-12 mt-4">
                                <div class="form-group" align="center">
                                    <label>User Type</label>
                                    <select name="role" id="role" class="form-control" style="width: 35%;">

                                    <option value="customer" <?php if ('customer'== $set_role) echo ' selected="selected"'?>>
                                        Customer
                                    </option>
                                    <option value="vendor" <?php if ('vendor'== $set_role) echo ' selected="selected"'?>>
                                        Vendor
                                    </option>
                                    <option value="admin" <?php if ('admin'== $set_role) echo ' selected="selected"'?>>
                                        Admin
                                    </option>

                                   </select>
                                </div>                            
                            </div>

                        </div>

                        <div class="mt-4 text-center">
                            
                            <input type="hidden" name="update_id" value="<?php echo $set_userid; ?>">

                            <button type="submit" name="update_user"  class="btn btn-primary btn-block waves-effect waves-light" style="width: 20%;">
                                Update
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