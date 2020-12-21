<!-- Functions -->
<?php include ('../functions/functions.php'); ?>
<!-- Admin Session -->
<?php include ('includes/session.php'); ?>

<?php $product_details = product_details(); ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>

    <!-- Website Title -->
    <title>Manage Products</title>
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
                            <h4 class="mb-0 font-size-18">Manage Products</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Manage Products</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End content Title -->

                <!-- Content Start -->

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
                
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Table Tools -->
                                <div class="table-tools float-lc">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">

                                            <div class="btn-group mr-2">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-paper-plane"></i>&nbsp Export 
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item btn-copy">
                                                        <i class="fas fa-copy"></i>&nbsp Copy
                                                    </a>
                                                    <a class="dropdown-item btn-excel">
                                                        <i class="fas fa-file-excel"></i>&nbsp Excel
                                                    </a>
                                                    <a class="dropdown-item btn-pdf">
                                                        <i class="fas fa-file-pdf"></i>&nbsp PDF
                                                    </a>
                                                    <a class="dropdown-item btn-csv">
                                                        <i class="fas fa-file-csv"></i>&nbsp CSV
                                                    </a>
                                                    <a class="dropdown-item btn-print">
                                                        <i class="fas fa-print"></i>&nbsp Print
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="btn-group mr-2">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-eye"></i>&nbsp Visibility 
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item btn-pdefault">
                                                        <i class="fas fa-eye"></i>&nbsp Show Default
                                                    </a>
                                                    <a class="dropdown-item btn-pinfo">
                                                        <i class="fas fa-eye-slash"></i>&nbsp Product Info
                                                    </a>
                                                    <a class="dropdown-item btn-pdetails">
                                                        <i class="fas fa-eye-slash"></i>&nbsp Product Details
                                                    </a>
                                                    <a class="dropdown-item btn-pimages">
                                                        <i class="fas fa-eye-slash"></i>&nbsp Product Images
                                                    </a>
                                                    <a class="dropdown-item btn-paction">
                                                        <i class="fas fa-eye-slash"></i>&nbsp Product Actions
                                                    </a>
                                                    <a class="dropdown-item btn-showall">
                                                        <i class="fas fa-eye"></i>&nbsp Show All
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <form name="multipledeletion" method="post">

                                <div class="table-tools float-rc">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input type="text" id="searchbox" class="form-control float-rc ml-3  mb-3" placeholder="Search Users.." style="width: auto;">

                                            <button type="submit" name="multi-pdelete" class="btn btn-danger btn-md float-rc ml-3 mb-3" onClick="return confirm('Are you sure you want to delete?');" >Delete</button>
                                            
                                            <a href="add-product.php" class="btn btn-danger btn-create-users float-rc mb-3">
                                                <i class="fas fa-plus"></i>&nbsp Add Product
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <!-- User Table -->
                                <table id="datatable" class="table table-striped table-hover table-bordered display nowrap"
                                       style="width: 100%;">
                                    <thead class="thead-dark" style="width: 100% !important;">
                                        <tr>
                                            <th class="text-center"><input type="checkbox" class="" id="select_all"/></th>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Sub-Category</th>
                                            <th class="text-center">MRP</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Short-Desc</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Featured Image</th>
                                            <th class="text-center">Gallery Images</th>
                                            <th class="text-center">Added By</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($product_details as $key => $product_detail): ?>
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" class="checkbox" name="ids[]" value="<?php echo $product_detail['id'];?>"/>
                                            </td>
                                            <td class="text-center"><?php echo $key + 1; ?></td>
                                            <td class="text-center"><?php echo $product_detail['product_name']; ?></td>
                                            <td class="text-center"><?php echo $product_detail['categories_id']; ?></td>
                                            <td class="text-center"><?php echo $product_detail['sub_categories_id']; ?></td>
                                            <td class="text-center"><?php echo $product_detail['mrp']; ?></td>
                                            <td class="text-center"><?php echo $product_detail['price']; ?></td>
                                            <td class="text-center"><?php echo $product_detail['quantity']; ?></td>
                                            <td class="text-center"><?php echo $product_detail['short_desc']; ?></td>
                                            <td class="text-center"><?php echo $product_detail['description']; ?></td>
                                            <?php $img_path = "../assets/images/products/" ?>                                            
                                            <td class="text-center">
                                                <img src="<?php echo $img_path.'/'.$product_detail['product_name'].'/'.$product_detail['featured_image']; ?>"
                                                style="width: 50px; height: 50px;">    
                                            </td>

                                            <td class="text-center">
                                            
                                            <?php $images = explode(",", $product_detail['gallery_images']); 
                                            foreach ($images as $value) :?> 

                                            <img src="<?php echo $img_path.'/'.$product_detail['product_name'].'/'.$value; ?>" 
                                            style="width: 50px; height: 50px;"> 

                                            <?php endforeach;?>

                                            </td>
                                                                                    
                                            <td class="text-center"><?php echo $product_detail['added_by']; ?></td>

                                    </form>

                                        <form method="post">

                                            <td class="text-center">
                                                <button class="btn btn-eye mr-2">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                
                                                <input type="hidden" name="status-id" value="<?php echo $product_detail['id']; ?>">

                                                <?php if ($product_detail['status'] == true) :?>
                                                    <button type="submit" name="publish" class="btn btn-check mr-2" 
                                                    style="background-color:#32CD32; color: white; ">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="submit" name="unpublish" class="btn btn-times mr-2"
                                                    style="background-color:#FF0000; color: white;">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                <?php endif ?>

                                                <?php if ($product_detail['featured_product'] == true) :?>
                                                    <button type="submit" name="add_fp" class="btn btn-check mr-2" 
                                                    style="background-color:#32CD32; color: white;" data-toggle="tooltip" data-placement="top" title="Remove from Featured Product">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="submit" name="remove_fp" class="btn btn-times mr-2"
                                                    style="background-color:#FF0000; color: white;" data-toggle="tooltip" data-placement="top" title="Add to Featured Product">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                <?php endif ?>

                                                <a href="edit-product?<?php echo $product_detail['slug']; ?>" 
                                                class="btn btn-pencil-alt mr-2">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                
                                                <input type="hidden" name="delete-id" value="<?php echo $product_detail['id']; ?>">

                                                <button type="submit" name="single-pdelete" class="btn btn-trash-alt">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>

                                        </form>

                                        </tr>

                                        <?php endforeach ?>
                                    
                                    </tbody>
                                </table>
                                

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->

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
<script src="assets/libs/datatables/js/datatable-product.js"></script>

</body>
</html>