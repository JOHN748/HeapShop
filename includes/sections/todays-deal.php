<div class="card">

    <div class="head-title">
        <h5 class="title float-left">TODAY'S DEAL</h5>
        <p class="title float-right">See More</p>
    </div>

    <div class="card-body">
        <div class="row featured_products">
            <?php foreach ($featured_products as $key => $featured_product): ?>

            <div class="product-box">
              <div class="card-body">
              <img  src="admin/assets/images/products/<?php echo $featured_product['featured_image']; ?>" alt="Card image cap" style="width:100%; height:100%; object-fit: cover;">
                <p class="card-text"><?php echo $featured_product['product_name']; ?></p>
              </div>
            </div>

            <?php endforeach ?>
        </div>
    </div>

</div>


