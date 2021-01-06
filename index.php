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
    	.slick-next{
    		display: none;
    	}

    	.slick-prev{
    		display: none;
    	}

    	.prv-btn{
		    background-color: #A0A9C8;
		    color: white;
		    font-size: 1.8rem; 
		    float: left;
		    border:none;  
		    border-top-right-radius: 4px;
		    border-bottom-right-radius: 4px;
		    padding: 50px 15px 50px 15px;
		    position: absolute;
		    bottom: 35%;
		    left: 0;
		    display: none;
		    box-shadow: 1px 1px 3px 0px #888;
		}

		.nxt-btn{
		    background-color: #A0A9C8;
		    color: #dfdfdf;
		    font-size: 1.8rem;
		    float: right;
		    border: none;
		    border-bottom-left-radius: 4px;
		    border-top-left-radius: 4px;
		    padding: 50px 15px 50px 15px;
		    position: absolute;
		    bottom: 35%;
		    right: 0;
		    display: none;
		    box-shadow: 0px 1px 3px 0px #888;
		}

		.card-body:hover .prv-btn, .nxt-btn{
		    display: block;
		}

		.fproduct{
		    position: relative;
		    overflow: hidden;
		    background-color: #E3F8FF; /* #E3F8FF , #FFE8DF , white */
		    border: none;
		    border-radius: 8px;
		    box-shadow: 0 0px 3px 0px rgb(161, 163, 164);
		}

		.fproduct:hover{
		    -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
		    -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
		    box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
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
                <?php include 'includes/sections/featured-product.php'; ?>

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