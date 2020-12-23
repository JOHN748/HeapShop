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
    <title>Edit Categories</title>
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
                            <h4 class="mb-0 font-size-18">Add Categories</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Add Categories</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End content Title -->

                <!-- Content Start -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="edit-category.php" enctype="multipart/form-data">
                                <div class="card-body card-block">
                                    <div class="form-group mb-2">
                                        <label class="form-control-label">Categories</label>
                                        <input type="text" name="categories" placeholder="Enter categories name" class="    form-control" value="<?php echo $set_categories; ?>" required>
                                    </div>
                                    
                                    <div class="form-group mt-3 mb-2">
                                        <label class=" form-control-label">Short Description</label>
                                        <textarea name="category_description" class="form-control" rows="3" placeholder="Write Short Description..." required><?php echo $set_cat_desc; ?></textarea>
                                    </div>

                                    <div class="form-group mt-3 mb-3">
                                        <label>Upload Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  name="category_image" id="customFile">
                                            <label class="custom-file-label" for="customFile"><?php echo $set_cat_image; ?></label>
                                        </div>
                                    </div>

                                    <div class="text-center mt-4">
                                        <input type="hidden" name="update_cat_id" value="<?php echo $set_cat_id; ?>">
                                        <input type="hidden" name="old_catimg" value="<?php echo $set_cat_image; ?>">

                                        <button type="submit" name="update_category" class="btn btn-primary">
                                            Update Category
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

<!-- Form JS -->
<script src="assets/libs/form-element/file-input.js"></script>
<script src="assets/libs/form-element/form-element.js"></script>

</body>
</html>                       



            