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
    <title>Add Product</title>
    <!-- Meta Tags -->
    <?php include 'includes/header/meta-tags.php'; ?>
    <!-- Default CSS -->
    <?php include 'includes/header/header-styles.php'; ?>

    <style>
        @media (max-width: 768px) {
            .md_rl{
                float: left;
            }
        }
        @media (min-width: 769px) {
            .md_rl {
                float: right;
            }
        }
    </style>

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
                            <h4 class="mb-0 font-size-18">Add Product</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Add Product</li>
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

                                    <div class="form-group mt-3 mb-3">
                                        <label class=" form-control-label">Description</label>
                                        <textarea name="description" class="form-control" placeholder="Write Description..." rows="5" required></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Upload Featured Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="featured_image" id="customFile" required>
                                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label class="form-control-label">Upload Gallery Images</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="gallery_image[]" 
                                                    id="customFile" required multiple>
                                                    <label class="custom-file-label" for="customFile">Choose Images</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <select name="category_id" id="categories" class="form-control">
                                                <option>Select Category</option>  
                                                <?php 
                                                    $result   = mysqli_query($db, "SELECT * FROM categories ORDER BY id ASC");
                                                    while($data=mysqli_fetch_array($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $data['id'];?>">
                                                    <?php echo $data['categories'];?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subcategory Name</label>
                                            <select name="sub_category_id" id="sub_categories" class="form-control">

                                            </select>
                                        </div> 
                                    </div>

                                    </div>

                                    <div class="form-group mt-2 mb-2">
                                        <label class=" form-control-label">Product Slug</label>
                                        <input type="text" name="product_slug" placeholder="Enter the Product Slug" class="form-control" required>
                                        <span class="text-danger"><?php echo $slug_err; ?></span>
                                    </div>

                                    

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="custom-control custom-switch custom-switch-md mb-3" dir="ltr">
                                                <input type="hidden" name="check" value="0" />
                                                <input type="checkbox" name="check" value="1" class="custom-control-input" 
                                                id="customSwitchsizemd">
                                                <label class="custom-control-label" for="customSwitchsizemd">Active</label>
                                            </div>

                                            <button type="submit" name="add_product" class="btn btn-primary">
                                                Add Product
                                            </buttons>
                                        </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('#categories').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {
                console.log(response);
                $("#sub_categories").html(response);
            },
        });
    }); 

});

</script>

</body>
</html>                       



            