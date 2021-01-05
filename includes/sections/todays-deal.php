<div class="card">

    <div class="head-title">
        <h5 class="title float-left">TODAY'S DEAL</h5>
        <a href="#">
            <p class="title float-right"><i class="fas fa-eye"></i> View All</p>
        </a>
    </div>

    <div class="card-body" style="position: relative;">
        <div class="row featured_product">

            <?php foreach ($featured_products as $key => $featured_product): ?>
            <div class="fproduct">
                <div class="fcard-img-top">
                    <img src="assets/images/products/<?php echo $featured_product['product_name']; ?>/<?php echo $featured_product['featured_image']; ?>" class="fcard-img">
                </div>
                <div class="card_actions">
                        <a href="" class="pico-left d-flex align-items-center">
                            <i class="far fa-heart"></i>
                        </a>
                        <span class="price-bf"><?php echo $featured_product['mrp']; ?></span>
                        <a href="" class="pico-right d-flex align-items-center">
                            <i class="fas fa-cart-plus"></i>
                        </a>
                        <span class="price-af"><?php echo $featured_product['price']; ?></span>
                </div>
                <div class="product-body">
                    <p class="fcard_title"><?php echo $featured_product['product_name']; ?></p>
                </div>
            </div>
            <?php endforeach ?>

        </div>
        <button class="prv-btn"><i class="fas fa-angle-left"></i></button>
        <button class="nxt-btn"><i class="fas fa-angle-right"></i></button>
    </div>

</div>

