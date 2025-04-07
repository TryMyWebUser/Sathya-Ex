  <?php
    include("header.php");
    ?>
  <!-- main-area -->
  <main class="main-area fix">
      <!-- slider-area -->
      <section class="slider__area-two">
          <div class="swiper slider-active-two" style="height:500px;">
              <div class="swiper-wrapper">
                  <?php
            include("config.php");
            $query = "SELECT * FROM banner LIMIT 1"; 
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $image = "../sathyadb/banner/" . $row['image'];
                $heading1 = $row['heading1'];
                $heading2 = $row['heading2'];
            }
            ?>
                  <div class="swiper-slide slider__bg-two" style="background-image: url('<?php echo $image; ?>'); 
                      background-size: cover; background-position: center center; width: 1920px;">
                      <div class="container">
                          <div class="row justify-content-end">
                              <div class="col-xl-7 col-lg-7">
                                  <div class="slider__content-two">
                                      <h4 class="" style="color:white; font-size:45px;"><?php echo $heading1; ?></h4>
                                      <span class="sub-title"><?php echo $heading2; ?></span>
                                      <div class="slider__btn">
                                          <a href="prodcategory.php" class="btn btn-two">View Our Products <img
                                                  src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                                          <a href="turnkeycategory.php" class="btn btn-two">Turn Key Solution <img
                                                  src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="slider__shape" data-background="assets/img/slider/slider_shape.png"></div>
                  </div>

              </div>
          </div>
      </section>
      <!-- slider-area-end -->

      <!-- about-area -->
      <section class="about__area-five grey-bg-two section-py-120">
          <div class="container">
              <?php
                                                include("config.php");
                                          $result = $conn->query("SELECT * FROM about_images");
                                                         if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $heading = $row['heading'];
                                                    $exp =  $row['experience'];
                                                    $description = $row['description'];
                                                    $aimage1 = '../sathyadb/about_images/' . $row['img1'];
                                                    $aimage2 = '../sathyadb/about_images/' . $row['img2'];
                                                    $aimage3 = '../sathyadb/about_images/' . $row['img3'];
                                                 
                                                    ?>
              <div class="row gutter-24 align-items-center justify-content-center">
                  <div class="col-lg-6 col-md-9">
                      <div class="about__img-wrap-five">
                          <img src="<?php echo $aimage1 ?>" alt="img" class="wow img-custom-anim-right animated"
                              data-wow-duration="1.5s" data-wow-delay="0.2s">
                          <img src="<?php echo $aimage2 ?>" alt="img" class="wow img-custom-anim-left animated"
                              data-wow-duration="1.5s" data-wow-delay="0.4s">
                          <img src="<?php echo $aimage3 ?>" alt="img" class="wow img-custom-anim-top animated"
                              data-wow-duration="1.5s" data-wow-delay="0.6s">
                          <div class="experience__box-two wow img-custom-anim-top animated" data-wow-duration="1.5s"
                              data-wow-delay="0.8s">
                              <div class="experience__box">
                                  <p style="font-size:20px; font-weight:bold;"><?php echo $exp ?></p>
                              </div>
                          </div>

                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="about__content-five">
                          <div class="section__title section__title-three mb-30">
                              <span class="sub-title">About Our Company</span>
                              <h2 class="title"><?php echo $heading ?></h2>
                              <p><?php echo $description ?></p>
                              <?php
                                                }
                                            }
                                            ?>
                              <ul class="list-wrap banner__list-box">
                                  <?php
    include("config.php");
    $result = $conn->query("SELECT * FROM list");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $heading = $row['name'];
            echo '<li><i class="fas fa-check"></i>'.$heading.'</li>';
        }
    }
?>
                              </ul>
                              <div class="about__content-bottom about__content-bottom-two">
                                  <a href="about.php" class="btn btn-two">More About Us<img
                                          src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      </section>
      <!-- about-area-end -->

      <!-- features-area -->
      <section class="features__area-two grey-bg-two  section-pb-95">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="section__title section__title-three text-center mb-60">
                          <span class="sub-title">Our Features</span>
                          <?php
                            include("config.php");
                            $result = $conn->query("SELECT * FROM feature");
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $main_heading = $row['main_heading'];
                                    echo '<h2 class="title">'.$main_heading.'</h2>';
                                }
                            }
                        ?>
                      </div>
                  </div>
              </div>
              <div class="row gutter-24">
                  <div class="col-lg-12">
                      <div class="features__item-two shine__animate-item">
                          <div class="features__thumb-two shine__animate-link">
                              <?php
                            include("config.php");
                            $result = $conn->query("SELECT * FROM feature");
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $image = '../sathyadb/feature/' . $row['image'];
                                    echo ' <img src="'.$image.'" alt="img">';
                                }
                            }
                              ?>

                          </div>
                          <div class="features__content-two">
                              <?php
                            include("config.php");
                            $result = $conn->query("SELECT * FROM feature");
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $sub_heading = $row['sub_heading'];
                                    echo ' <h2 class="title">'.$sub_heading.'</h2>';
                                }
                            }
                                 ?>

                              <ul class="list-wrap">
                                  <?php
                            include("config.php");
                            $result = $conn->query("SELECT * FROM feature");
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $list = $row['list'];
                                    echo ' <li>'.$list.'</li>';
                                }
                            }
                              ?>
                              </ul>
                              <a href="contact.php" class="btn btn-two">Contact With Us<img
                                      src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- features-area-end -->

      <!-- Products slider -->
      <section class="history__area-two section-pb-120 mt-5">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="section__title section__title-three white-title text-center mb-60">
                          <h2 class="title" style="color:black">Our Product Category</h2>
                      </div>
                  </div>
              </div>
              <div class="history__item-wrap">
                  <div class="swiper history__active fix">
                      <div class="swiper-wrapper">
                          <?php
                            include("config.php");
                            $result = $conn->query("SELECT * FROM product_category");
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $title = $row['name'];
                                    $image = '../sathyadb/product_category/' . $row['image'];
                                ?>
                          <div class="swiper-slide">
                              <div class="history__item">
                                  <div class="history__thumb">
                                      <img src="<?php echo $image ?>" alt="img">
                                  </div>
                                  <div class="history__item-content">
                                      <h4 class="title text-center"><?php echo $title ?></h4>
                                  </div>
                              </div>
                          </div>
                          <?php
                                }
                            }
                          ?>
                      </div>
                      <div class="history__nav">
                          <button class="history-button-prev"><i class="renova-right-arrow"></i></button>
                          <button class="history-button-next"><i class="renova-right-arrow"></i></button>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Products slider -->
      <!-- Turn Key Solution slider -->
      <section class="history__area-two section-pb-120 mt-3">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="section__title section__title-three white-title text-center mb-60">
                          <!-- <h2 class="title" style="color:black">Products</h2> -->
                          <h2 class="title" style="color:black"> Turn Key Solution Category</h2>
                      </div>
                  </div>
              </div>
              <div class="history__item-wrap">
                  <div class="swiper history__active fix">
                      <div class="swiper-wrapper">
                          <?php
                            include("config.php");
                            $result = $conn->query("SELECT * FROM turnkey_category");
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $title = $row['name'];
                                    $image = '../sathyadb/turnkey_category/' . $row['image'];
                                ?>
                          <div class="swiper-slide">
                              <div class="history__item">
                                  <div class="history__thumb">
                                      <img src="<?php echo $image ?>" alt="img">
                                  </div>
                                  <div class="history__item-content">
                                      <h4 class="title text-center"><?php echo $title ?></h4>
                                  </div>
                              </div>
                          </div>
                          <?php
                                }
                            }
                          ?>
                      </div>
                      <div class="history__nav">
                          <button class="history-button-prev"><i class="renova-right-arrow"></i></button>
                          <button class="history-button-next"><i class="renova-right-arrow"></i></button>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Turn Key Solution slider -->

  </main>
  <!-- main-area-end -->


  <?php
include("footer.php");
?>