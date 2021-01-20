<div class="card">

    <div class="head-title">
        <h5 class="title float-left">Featured Products</h5>
        <a href="featured-products.php">
            <p class="title float-right"><i class="fas fa-eye"></i> View All</p>
        </a>
    </div>

    <div class="card-body" style="position: relative;">
        <div class="row featured_product">

            <?php foreach ($featured_products as $key => $featured_product): ?>
            <div class="product">
                <div class="product-image-bx">
                    <img src="assets/images/products/<?php echo $featured_product['product_name']; ?>/<?php echo $featured_product['featured_image']; ?>" class="product-image">
                </div>
                <form method="post">
                    <div class="card-actions">

                        <input type="hidden" name="add_wuid" value="<?php echo $_SESSION['user']['id'] ?>">
                        <input type="hidden" name="add_wpid" value="<?php echo $featured_product['id'] ?>">
                        <input type="hidden" name="add_wname" value="<?php echo $featured_product['product_name'] ?>">
                        <input type="hidden" name="add_wimage" value="<?php echo $featured_product['featured_image'] ?>">
                                            
                        <?php 
                            $wuid = $_SESSION['user']['id'];
                            $wpid = $featured_product['id'];
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


                        <span class="price-bf">$ <?php echo $featured_product['mrp']; ?></span>

                        <a href="" class="pico-right d-flex align-items-center">
                            <i class="fas fa-cart-plus"></i>
                        </a>
                        <span class="price-af">$ <?php echo $featured_product['price']; ?></span>
                    </div>
                </form>
                <div class="product-body">
                    <p class="product-title"><?php echo $featured_product['product_name']; ?></p>
                </div>
            </div>
            <?php endforeach ?>

        </div>
        <button class="prv-btn"><i class="fas fa-angle-left"></i></button>
        <button class="nxt-btn"><i class="fas fa-angle-right"></i></button>
    </div>

</div>

