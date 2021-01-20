<div class="card">

    <div class="head-title">
        <h5 class="title float-left">Recent Products</h5>
        <a href="featured-products.php">
            <p class="title float-right"><i class="fas fa-eye"></i> View All</p>
        </a>
    </div>

    <div class="card-body" style="position: relative;">
        <div class="row">

            <?php foreach ($product_details as $key => $product_detail): ?>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 mb-4 p-2">
                <div class="product">
                    <div class="product-image-bx">
                        <img src="assets/images/products/<?php echo $product_detail['product_name']; ?>/<?php echo $product_detail['featured_image']; ?>" class="product-image">
                    </div>
                    <form method="post">
                        <div class="card-actions">                                
                            <input type="hidden" name="add_wuid" value="<?php echo $_SESSION['user']['id'] ?>">
                            <input type="hidden" name="add_wpid" value="<?php echo $product_detail['id'] ?>">
                            <input type="hidden" name="add_wname" value="<?php echo $product_detail['product_name'] ?>">
                            <input type="hidden" name="add_wimage" value="<?php echo $product_detail['featured_image'] ?>">
                                                
                            <?php 
                                $wuid = $_SESSION['user']['id'];
                                $wpid = $product_detail['id'];
                                $query = "SELECT * FROM wishlist WHERE user_id='$wuid' AND product_id='$wpid' LIMIT 1";
                                $results = mysqli_query($db, $query);
                                if (mysqli_num_rows($results) == 1): 
                            ?>
                            <button name="remove_wish" class="pico-left d-flex align-items-center" style="background:none; border: none;">
                                <i class="fas fa-heart" style="color: red;"></i>
                            </button>
                            <?php else: ?>
                            <button name="add_wish" class="pico-left d-flex align-items-center" style="background:none; border: none;">
                                <i class="far fa-heart"></i>
                            </button>                                
                            <?php endif; ?>

                            <span class="price-bf">$ <?php echo $product_detail['mrp']; ?></span>
                            <a href="" class="pico-right d-flex align-items-center">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                            <span class="price-af">$ <?php echo $product_detail['price']; ?></span>
                        </div>
                    </form>
                    <div class="product-body">
                        <p class="product-title"><?php echo $product_detail['product_name']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>

        </div>

    </div>

</div>

