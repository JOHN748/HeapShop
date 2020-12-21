<!-- Functions -->
<?php include ('functions/functions.php'); ?>
<!-- Session -->
<?php include ('includes/session.php') ?>

<?php $category_details = category_details(); ?>
<?php $sub_category_details = sub_category_details(); ?>
<?php $featured_products = featured_products(); ?>

<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<head>
    <!-- Website Title -->
    <title>Heap Shop</title>
    <!-- Meta Tags -->
    <?php include 'includes/header/meta-tags.php'; ?>
    <!-- Default CSS -->
    <?php include 'includes/header/header-styles.php'; ?>

    <style>

/* CATEGORY SLIDER */
      
.category {
     position: relative;
     display: flex;
     width: 100px;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid #d2d2dc;
     border-radius: 11px;
     -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
     -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
     box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
}

.category .category-body {
     padding: 1rem 1rem;
}

.category-body {
    flex: 1 1 auto;
    padding: 1.25rem
}

.category_img {
     height: 67px
}


.slick-slide {
     margin: 10px
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

                <!-- Notification Message -->
                <?php if (isset($_SESSION['message'])) : ?>
                    <script>
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title : '<h1 style="color:#ff8080; font-family: lemonjelly; font-size: 2em;"><?php echo $_SESSION['message']; ?></h1>',
                          html: '<h4 style="color: #333300;">Welcome to HeapShop!<h4>',
                          background: 'url(assets/images/trees.png)',
                          width: 700,
                          padding: '1em',
                          showConfirmButton: false,
                          timer: 4000
                        })
                    </script>
                    <?php unset($_SESSION['message']); ?>
                <?php endif ?>
           
                <!-- Content -->

                <?php include 'includes/sections/sliders.php'; ?>
                <?php include 'includes/sections/top-deals.php'; ?>
                <?php include 'includes/sections/todays-deal.php'; ?>

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