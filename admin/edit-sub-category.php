<!-- Functions -->
<?php include ('../functions/functions.php'); ?>
<!-- Admin Session -->
<?php include ('includes/session.php'); ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>

	<!-- Title Tag -->
	<title>Edit Sub-Category</title>
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
                            <h4 class="mb-0 font-size-18">Edit Sub-Category</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Edit Sub-Category</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End content Title -->

                <!-- Main Content -->                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="edit-sub-category.php" enctype="multipart/form-data">
                                <div class="card-body card-block">
                                    
                                    <div class="form-group mb-2">
                                        <label class="form-control-label">Categories</label>

                                        <select name="categories_id" class="form-control" required>
                                            
                                            <option value="">Select Categories</option>
                                            
                                            <?php
                                            $result = mysqli_query($db,"SELECT * FROM categories");
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['id'] == $set_scatidd){
                                                   echo "<option value=".$row['id']." selected>".$row['categories']."</option>";
                                                }else{
                                                   echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                                } 
        	                                } ?>

                                        </select>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class="form-control-label">Sub-Category</label>
                                        <input type="text" name="sub-category" placeholder="Enter categories name" class="    form-control" value="<?php echo $set_scategories; ?>" required>
                                        <span class="text-danger"><?php echo $sub_cats_err; ?></span>
                                    </div>

                                    <div class="form-group mt-3 mb-3">
                                        <label>Upload Photo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  name="sub_category_image" id="customFile">
                                            <label class="custom-file-label" for="customFile"><?php echo $set_scat_image; ?></label>
                                        </div>
                                    </div>

                                    <div class="text-center mt-4">
                                        <input type="hidden" name="update_scat_id" value="<?php echo $set_scatid; ?>">
                                        <input type="hidden" name="old_subcatimg" value="<?php echo $set_scat_image; ?>">

                                        <button type="submit" name="update_sub_category" class="btn btn-primary">
                                            Update Sub-Category
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



            