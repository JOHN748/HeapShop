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
    <title>Edit Product</title>
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
                            <h4 class="mb-0 font-size-18">Edit Product</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Edit Product</li>
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
                            <form class="form-horizontal" method="post" action="add-product.php" enctype="multipart/form-data">
                                <div class="card-body card-block">
                                    
                                    <div class="form-group mt-3 mb-2">
                                        <label class=" form-control-label">Product Name</label>
                                        <input type="text" name="product_name" placeholder="Enter the Product Name" class="form-control" required>
                                        <span class="text-danger"><?php echo $product_err; ?></span>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class=" form-control-label">MRP</label>
                                        <input type="text" name="mrp" placeholder="Enter Product MRP" class="form-control" required>
                                    </div>
                                
                                    <div class="form-group mb-2">
                                        <label class=" form-control-label">Price</label>
                                        <input type="text" name="price" placeholder="Enter Product Price" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group mb-2">
                                        <label class=" form-control-label">Quantity</label>
                                        <input type="text" name="quantity" placeholder="Enter Product Quantity" class="form-control" required>
                                    </div>

                                    <div class="form-group mt-3 mb-2">
                                        <label class=" form-control-label">Short Description</label>
                                        <textarea name="short_desc" class="form-control" placeholder="Write Short Description.." rows="3" required></textarea>
                                    </div>

                                    <div class="form-group mt-3 mb-2">
                                        <label class=" form-control-label">Description</label>
                                        <textarea name="description" class="form-control" placeholder="Write Description..." rows="5" required></textarea>
                                    </div>

                                    <div class="form-group mt-3 mb-3">
                                        <label>Upload Featured Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  name="featured_image" id="customFile" required>
                                            <label class="custom-file-label" for="customFile">Choose Image</label>
                                        </div>
                                    </div>

                                    <label>Upload Gallery Images</label>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="gallery_image1" id="customFile" required>
                                                    <label class="custom-file-label" for="customFile">Choose Image 1</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="gallery_image2" id="customFile" required>
                                                    <label class="custom-file-label" for="customFile">Choose Image 2</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="gallery_image3" id="customFile" required>
                                                    <label class="custom-file-label" for="customFile">Choose Image 3</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="gallery_image4" id="customFile" required>
                                                    <label class="custom-file-label" for="customFile">Choose Image 4</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="form-control-label">Categories</label>
                                                <select class="form-control" required>
                                                    <option>Select Categories</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="form-control-label float-right">Sub-Categories</label>
                                                <select class="form-control" required>
                                                    <option>Select Sub-Categories</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-2 mb-2">
                                        <label class=" form-control-label">Product Slug</label>
                                        <input type="text" name="product_slug" placeholder="Enter the Product Slug" class="form-control" required>
                                        <span class="text-danger"><?php echo $slug_err; ?></span>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" name="add_product" class="btn btn-primary">
                                            Add Product
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

<!-- Form JS -->
<script src="assets/libs/form-element/file-input.js"></script>
<script src="assets/libs/form-element/form-element.js"></script>

</body>
</html>                       



            