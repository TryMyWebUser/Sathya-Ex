<?php
include("header.php");
?>
<!-- main-area -->
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <?php
include("config.php");
$query = "SELECT * FROM aboutbanner";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $aimage1 = '../sathyadb/pics/' . $row['image'];
    echo '<div class="breadcrumb__area breadcrumb__bg" data-background="'.$aimage1.'">
        </div>';
    } else {
        echo "No data found in the aboutbanner table.";
    }
    ?>
    <!-- breadcrumb-area-end -->
    <!-- about-area -->
    <section class="about__area-five grey-bg-two section-py-120">
        <div class="container">
            <?php
                                                include("config.php");
                                          $result = $conn->query("SELECT * FROM about_page");
                                                         if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $heading1 = $row['heading'];
                                                    $heading2 = $row['heading2'];
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
                            <span class="sub-title"><?php echo $heading1 ?></span>
                            <h2 class="title"><?php echo $heading2 ?></h2>
                            <p><?php echo $description ?></p>
                            <?php
                                                }
                                            }
                                            ?>
                            <ul class="list-wrap banner__list-box">
                                <?php
    include("config.php");
    $result = $conn->query("SELECT * FROM about_pagelsit");
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
</main>
<!-- main-area-end -->



<?php
include("footer.php");
?>