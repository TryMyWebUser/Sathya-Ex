<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sathya Coatings Private Limited</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo1.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/fontello.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/default-icons.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/tg-cursor.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<style>
/* for desktop */
.whatsapp_float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    left: 40px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 100;
}

.whatsapp-icon {
    margin-top: 16px;
}

/* for mobile */
@media screen and (max-width: 767px) {
    .whatsapp-icon {
        margin-top: 10px;
    }

    .whatsapp_float {
        width: 40px;
        height: 40px;
        bottom: 20px;
        left: 10px;
        font-size: 22px;
    }
}
</style>

<body>

    <!--Preloader-->
    <!--<div id="preloader">-->
    <!--    <div id="loader" class="loader">-->
    <!--        <div class="loader-container">-->
    <!--            <div class="loader-icon"><img src="assets/img/logo1.png" alt="Preloader"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="renova-up-arrow"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header>

        <div id="header-fixed-height"></div>
        <div id="sticky-header" class="tg-header__area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="tgmenu__wrap">
                            <nav class="tgmenu__nav">
                                <div class="">
                                    <a href="index.php" style="font-size:25px;"><img src="assets/img/logo1.png"
                                            alt="Logo"> SATHYA COATINGS</a>
                                </div>
                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                    <ul class="navigation">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">About us </a></li>
                                        <li class="menu-item-has-children">
                                            <a href="prodcategory.php">Products</a>
                                            <ul class="sub-menu">
                                                <?php
                                                    include("config.php");
                                                    $categoryQuery = "SELECT * FROM category";
                                                    $categoryResult = $conn->query($categoryQuery);

                                                    if ($categoryResult->num_rows > 0) {
                                                        while ($row = $categoryResult->fetch_assoc()) {
                                                            echo '<li class="menu-item-has-children">';
                                                            echo '<a href="prodsubcat.php?id='.$row['id'].'">'.$row['cat_name'].'</a>'; 

                                                            $subcategoryQuery = "SELECT * FROM prodsubcat WHERE cat_id = ".$row['id'];
                                                            $subcategoryResult = $conn->query($subcategoryQuery);
                                                            
                                                            if ($subcategoryResult->num_rows > 0) {
                                                                echo '<ul class="sub-menu">';
                                                                while ($subrow = $subcategoryResult->fetch_assoc()) {
                                                                    echo '<li><a href="anticorrosive.php?id='.$subrow['subcat_id'].'">'.$subrow['subcat_name'].'</a></li>';
                                                                }
                                                                echo '</ul>';
                                                            }
                                                            
                                                            echo '</li>';
                                                        }
                                                    }
                                                    ?>

                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="turnkeycategory.php">Turn Key Solution</a>
                                            <ul class="sub-menu">
                                                <?php
                                                    include("config.php");
                                                    $categoryQuery = "SELECT * FROM turncategory";
                                                    $categoryResult = $conn->query($categoryQuery);

                                                    if ($categoryResult->num_rows > 0) {
                                                        while ($row = $categoryResult->fetch_assoc()) {
                                                            echo '<li class="menu-item-has-children">';
                                                          echo '<a href="turnsubcat.php?id='.$row['id'].'">'.$row['cat_name'].'</a>';

                                                            $subcategoryQuery = "SELECT * FROM turnsubcat WHERE cat_id = ".$row['id'];
                                                            $subcategoryResult = $conn->query($subcategoryQuery);
                                                            
                                                            if ($subcategoryResult->num_rows > 0) {
                                                                echo '<ul class="sub-menu">';
                                                                while ($subrow = $subcategoryResult->fetch_assoc()) {
                                                                    echo '<li><a href="anticorrosive2.php?id='.$subrow['subcat_id'].'">'.$subrow['subcat_name'].'</a></li>';
                                                                }
                                                                echo '</ul>';
                                                            }
                                                            
                                                            echo '</li>';
                                                        }
                                                    }
                                                    ?>

                                            </ul>
                                        </li>
                                        <li><a href="gallery.php">Gallery</a></li>
                                        <li><a href="industry.php">Industries Served</a></li>
                                        <li><a href="contact.php">Contact </a></li>
                                    </ul>
                                </div>
                                <div class="tgmenu__action">
                                    <ul class="list-wrap">
                                        <li class="header-btn">
                                            <a href="https://wa.me/+919994924939" class="btn border-btn"
                                                target="_blank">Get Quote</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="tgmobile__menu">
            <nav class="tgmobile__menu-box">
                <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                <div class="nav-logo">
                    <a href="index.html"><img src="assets/img/logo1.png" alt="Logo"></a>
                </div>
                <div class="tgmobile__menu-outer">
                </div>
                <div class="social-links">
                    <ul class="list-wrap">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="tgmobile__menu-backdrop"></div>
        <!-- End Mobile Menu -->

        <!-- header-search -->
        <div class="search__popup">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search__wrapper">
                            <div class="search__close">
                                <button type="button" class="search-close-btn">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="search__form">
                                <form action="#">
                                    <div class="search__input">
                                        <input class="search-input-field" type="text" placeholder="Type keywords here">
                                        <span class="search-focus-border"></span>
                                        <button>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-popup-overlay"></div>
        <!-- header-search-end -->

        <!-- offCanvas-menu -->
        <div class="offCanvas__info">
            <div class="offCanvas__close-icon menu-close">
                <button><i class="far fa-window-close"></i></button>
            </div>
            <div class="offCanvas__logo mb-30">
                <a href="index.html"><img src="assets/img/logo1.png" alt="Logo"></a>
            </div>
            <div class="offCanvas__side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p>221 Chinnammal Nagar, Edayarpalayam, Vadavalli Road, Coimbatore-641041</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p>+91 93456 82897</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p>info@sathyacoatings.com</p>
                </div>
            </div>
            <div class="offCanvas__social-icon mt-30">
                <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                <a href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="offCanvas__overly"></div>
        <!-- offCanvas-menu-end -->

    </header>
    <!-- header-area-end -->