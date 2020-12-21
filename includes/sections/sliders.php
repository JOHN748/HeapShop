<!-- Main Slider -->

<div id="slide" class="carousel slide mb-4" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#slide" data-slide-to="0" class="active"></li>
    <li data-target="#slide" data-slide-to="1"></li>
    <li data-target="#slide" data-slide-to="2"></li>
    <li data-target="#slide" data-slide-to="3"></li>
    <li data-target="#slide" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item" data-interval="5000">
      <img src="https://i.pinimg.com/originals/8f/52/13/8f52135b7854c1f5d8759247f0b9e415.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="5000">
      <img src="https://i.pinimg.com/originals/fa/72/ed/fa72ed7b56bf8846d2409260696f1b29.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active" data-interval="5000">
      <img src="assets/images/slider/slider-1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="5000">
      <img src="assets/images/slider/slider-2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="5000">
      <img src="assets/images/slider/slider-3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
    <i class="fas fa-angle-left" style="color: #212121; font-size: 35px;"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
    <i class="fas fa-angle-right" style="color: #212121; font-size: 35px;"></i>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- Category Slider -->

<div class="categories">
    <?php foreach ($category_details as $key => $category_detail): ?>

        <div class="category">
          <div class="category-body d-flex justify-content-center"> 
            <img class="category_img" src="admin/assets/images/categories/<?php echo $category_detail['category_image']; ?>"> 
          </div>
        </div>

    <?php endforeach ?>
</div>