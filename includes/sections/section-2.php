<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header bg-transparent border-bottom">
                <h5 class="mb-0">Filters</h5>
            </div>

            <div class="p-4">
                <h5 class="font-size-16 mb-3">Categories</h5>
                
                <div class="custom-accordion">

                    <?php foreach ($category_details as $key => $category_detail): ?>
                    
                        <a class="text-body font-weight-semibold pb-2 d-block collapsed" data-toggle="collapse" 
                        role="button" aria-expanded="false" 
                        href="#<?php echo $category_detail['categories']; ?>" 
                        aria-controls="<?php echo $category_detail['categories']; ?>">
                            <?php echo $category_detail['categories']; ?>
                            <i class="mdi mdi-chevron-down accor-down-icon text-primary ml-1"></i>
                        </a>
                        
                        <div class="collapse" id="<?php echo $category_detail['categories']; ?>">
                            <div class="card shadow-none">
                                <ul class="list-unstyled categories-list mb-0">
                                
                                    <?php foreach ($sub_category_details as $key => $sub_category_detail): ?>

                                        <?php if ($category_detail['id'] == $sub_category_detail['categories_id']): ?>
                                        <li>
                                            <a href="#"><i class="mdi mdi-circle-medium mr-1"></i>
                                                    <?php echo $sub_category_detail['sub_categories']; ?>
                                            </a>
                                        </li>
                                        <?php endif ?>

                                    <?php endforeach ?>

                                </ul>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>


                <div class="border-top">
                    <div class="mt-4">
                        <h5 class="font-size-14 mb-0"><a href="#filterproduct-color-collapse" class="collapsed text-dark d-block" data-toggle="collapse">Customer Rating <i class="mdi mdi-chevron-down float-right accor-down-icon"></i></a></h5>

                        <div class="collapse" id="filterproduct-color-collapse">
                            <div class="mt-4">
                                <div class="custom-control custom-radio mt-2">
                                    <input type="radio" id="productratingRadio1" name="productratingRadio1" class="custom-control-input">
                                    <label class="custom-control-label" for="productratingRadio1">4 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                </div>
                                <div class="custom-control custom-radio mt-2">
                                    <input type="radio" id="productratingRadio2" name="productratingRadio1" class="custom-control-input">
                                    <label class="custom-control-label" for="productratingRadio2">3 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                </div>
                                <div class="custom-control custom-radio mt-2">
                                    <input type="radio" id="productratingRadio3" name="productratingRadio1" class="custom-control-input">
                                    <label class="custom-control-label" for="productratingRadio3">2 <i class="mdi mdi-star text-warning"></i>  & Above</label>
                                </div>
                                <div class="custom-control custom-radio mt-2">
                                    <input type="radio" id="productratingRadio4" name="productratingRadio1" class="custom-control-input">
                                    <label class="custom-control-label" for="productratingRadio4">1 <i class="mdi mdi-star text-warning"></i></label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h5>Showing result for "Headphone"</h5>
                                <ol class="breadcrumb p-0 bg-transparent mb-2">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Footwear</a></li>
                                    <li class="breadcrumb-item active">Headphone</li>
                                </ol>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-inline float-md-right">
                                <div class="search-box ml-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control bg-light border-light rounded" placeholder="Search...">
                                        <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>


                    <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                        <li class="nav-item">
                            <a class="nav-link disabled font-weight-medium" href="#" tabindex="-1" aria-disabled="true">Sort by:</a>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Popularity</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Newest</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Discount</a>
                        </li>
                        
                    </ul>

                <div class="row">
                    <?php foreach ($featured_products as $key => $featured_product): ?>

                        <div class="col-sm-6 col-lg-6 col-md-4 col-xl-4">
                            <div class="product-box">
                              <span class="ribbon4">10%</span>

                                <div class="product-img pt-4 px-4">
                                    <div class="product-wishlist">
                                        <a href="#">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </div>
                                    <img src="admin/assets/images/products/<?php echo $featured_product['featured_image']; ?>" 
                                    alt="" class="img-fluid mx-auto p-img">
                                    <img src="admin/assets/images/products/<?php echo $featured_product['featured_image']; ?>">
                                    <ul class="list-unstyled mb-0 text-muted product-color">
                                        <li>
                                            <i class="mdi mdi-cart text-warning"></i>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-circle text-light"></i>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-circle text-purple"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="page-content p-4">
                                    <h5 class="mb-1 text-center">
                                        <a href="#" class="text-secondary">
                                            <?php echo $featured_product['product_name']; ?>
                                        </a>
                                    </h5>
                                    <h5 class="mb-1 font-weight-semibold text-center text-danger">
                                        <?php echo $featured_product['price']; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                    </div>
                    <!-- end row -->

                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <div>
                                <p class="mb-sm-0">Page 2 of 84</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-sm-right">
                                <ul class="pagination pagination-rounded mb-sm-0">
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
