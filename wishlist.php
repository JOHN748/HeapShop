<!-- Functions -->
<?php include ('functions/functions.php'); ?>
<!-- Session -->
<?php include ('includes/session.php') ?>

<?php $wish_details = wish_details(); ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>
    <!-- Website Title -->
    <title>My Wishlist</title>
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

                <!-- Messages -->
                <?php include 'includes/messages.php'; ?>

                <!-- Content Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Wishlist</h4>
                            <!-- Breadcrumb -->
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Wishlist</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End content Title -->
           
                <!-- Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-hover table-bordered display nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">Product Image</th>
                                                <th class="text-center">Product Name</th>
                                                <th class="text-center">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <form method="post">
                                        <?php foreach ($wish_details as $key => $wish_detail): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $key + 1; ?></td>
                                                <td class="text-center">
                                                    <img src="assets/images/products/<?php echo $wish_detail['product_name'] ?>/<?php echo $wish_detail['product_image'] ?>" alt="product-img" title="product-img" class="avatar-md">
                                                </td>
                                                <td class="text-center">
                                                    <h5 class="font-size-14 text-truncate"><a href="#" class="text-dark"><?php echo $wish_detail['product_name'] ?></a></h5>
                                                </td>
                                                <td class="text-center">
                                                    <input type="hidden" name="add_wuid" value="<?php echo $_SESSION['user']['id'] ?>">
                                                    <input type="hidden" name="add_wpid" value="<?php echo $wish_detail['product_id'] ?>">
                                                    <button name="remove_wish" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </form>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-6">
                                        <a href="index.php" class="btn btn-secondary">
                                            <i class="mdi mdi-arrow-left mr-1"></i> Continue Shopping </a>
                                    </div> <!-- end col -->
                                    <div class="col-sm-6">
                                        <div class="text-sm-right mt-2 mt-sm-0">
                                            <a href="ecommerce-checkout.html" class="btn btn-success">
                                                <i class="mdi mdi-cart-arrow-right mr-1"></i> Checkout </a>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->

                            </div>
                        </div>
                    </div>

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