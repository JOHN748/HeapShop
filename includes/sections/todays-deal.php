<div class="card">

    <div class="head-title">
        <h5 class="title float-left">TODAY'S DEAL</h5>
        <a href="#">
            <p class="title float-right"><i class="fas fa-eye"></i> View All</p>
        </a>
    </div>

    <div class="card-body">
        <div class="row featured_products">

            <div class="product-card">
                <div class="product-img">                    
                    <img src="https://themesbrand.com/skote/layouts/assets/images/product/img-1.png" class="product-img">
                </div>
            </div>
            <div class="product-card">
                <div class="product-img">                    
                    <img src="https://themesbrand.com/skote/layouts/assets/images/product/img-4.png" class="product-img">
                </div>
            </div>
            <div class="product-card">
                <div class="product-img">                    
                    <img src="https://themesbrand.com/skote/layouts/assets/images/product/img-2.png" class="product-img">
                </div>
            </div>
            <div class="product-card">
                <div class="product-img">                    
                    <img src="https://themesbrand.com/skote/layouts/assets/images/product/img-3.png" class="product-img">
                </div>
            </div>
            <div class="product-card">
                <div class="product-img">                    
                    <img src="https://themesbrand.com/skote/layouts/assets/images/product/img-5.png" class="product-img">
                </div>
            </div>
            <div class="product-card">
                <div class="product-img">                    
                    <img src="https://themesbrand.com/skote/layouts/assets/images/product/img-6.png" class="product-img">
                </div>
            </div>

            <?php foreach ($featured_products as $key => $featured_product): ?>

            <div class="product-card col-md-3">
              <img  src="assets/images/products/<?php echo $featured_product['product_name']; ?>/<?php echo $featured_product['featured_image']; ?>" class="product-img">
                <p class="card-text"><?php echo $featured_product['product_name']; ?></p>
            </div>

            <?php endforeach ?>

        </div>

    </div>

</div>


