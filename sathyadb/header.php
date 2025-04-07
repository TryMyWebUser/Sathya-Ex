<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="css/vendor/LineIcons.min.css" rel="stylesheet">
    <link href="css/vendor/metisMenu.min.css" rel="stylesheet">
    <link href="css/vendor/mm-vertical.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include Font Awesome library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Main CSS -->
    <link href="css/style.css" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>

    <title>Sathya Groups</title>
</head>

<body>

    <div class="page-container">
        <nav id="sidebar" class="sidebar-nav">
            <div class="header-logo">
                <a class="navbar-brand no-margin main-logo" href="#"><img src="images/logo.png" alt="logo"></a>
                <a class="navbar-brand-logo" href="#"><img src="images/icon.png" alt="logo icon"></a>
            </div>
            <div class="user-panel">
                <div class="media">
                    <div class="pr">
                        <img src="images/user.png" alt="User">
                    </div>
                    <!-- <div class="media-body p-l-10 p-t-5">
                        <span class="title">ADMIN</span>
                    </div> -->
                </div>
                <a class="close-btn" href="#">X</a>
            </div>
            <ul class="vertical-nav-menu metismenu in" id="menu1">
                <li class="nav-title"><span class="title">MAIN</span></li>
                <li><a href="index.php" class="active"><i class="lni-dashboard"></i><span>Dashboard</span></a></li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>BANNER
                            IMAGES</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="image.php">Content Images</a></li>
                        <li><a href="aboutban.php">About Banner</a></li>
                        <li><a href="prodban.php">Products Banner</a></li>
                        <li><a href="prodsubcatban.php">Products Subcategory Banner</a></li>
                        <li><a href="prodcontban.php">Products Content Banner</a></li>
                        <li><a href="turnban.php">Turn Key Solution Banner</a></li>
                        <li><a href="turnsubcatban.php">Turn Key Solution Subcategory Banner</a></li>
                        <li><a href="turncontban.php">Turn Key Solution Content Banner</a></li>
                        <li><a href="prodban.php">Products Subcategory Banner</a></li>
                        <li><a href="prodban.php">Products Category Banner</a></li>
                        <li><a href="galban.php">Gallery Banner</a></li>
                        <li><a href="indban.php">Industry Service Banner</a></li>
                        <li><a href="contactban.php">Contact Us Banner</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>BANNER
                            IMAGES (Home Page)</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="banneradd.php">Add Images</a></li>
                        <li><a href="bannerview.php">View Images</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>ABOUT
                            SECTION (Home Page)</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="abtimgadd.php">Add Content</a></li>
                        <li><a href="abtimgview.php">View Content</a></li>
                        <li><a href="list.php">About List</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>FEATURE
                            SECTION (Home Page)</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <!-- <li><a href="fimage.php">Feature Section Image</a></li> -->
                        <li><a href="featureadd.php">Add Content</a></li>
                        <li><a href="featureview.php">View Content</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>
                            PRODUCT
                            CATEGORIES (Home Page)</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="contentadd.php">Add Content</a></li>
                        <li><a href="contentview.php">View Content</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>TURN KEY
                            SOLUTION PRODUCT
                            CATEGORIES (Home Page)</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="turnkeycontentadd.php">Add Content</a></li>
                        <li><a href="turnkeycontentview.php">View Content</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>ABOUT
                            PAGE</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="abtimgadd2.php">Add Content</a></li>
                        <li><a href="abtimgview2.php">View Content</a></li>
                        <li><a href="list2.php">About List</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>PRODUCT
                            CATEGORIES</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="catagory.php">Add Category</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>PRODUCT
                            SUB CATEGORIES</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="subcatadd.php">Add SubCategory</a></li>
                        <li><a href="subcatview.php">View SubCategory</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i
                            class="lni-add-file"></i><span>PRODUCTS</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add.php">Add Products</a></li>
                        <li><a href="view.php">View Products</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>TURN-KEY
                            CATEGORIES</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="turncategory.php">Add Category</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>TURN-KEY
                            SUB CATEGORIES</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="turnsubcategory.php">Add SubCategory</a></li>
                        <li><a href="turnsubcatview.php">View SubCategory</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>TRUN KEY
                            SOLUTIONS</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add1.php">Add Products</a></li>
                        <li><a href="view1.php">View Products</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i
                            class="lni-add-file"></i><span>GALLERY</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="imageadd.php">Add Image</a></li>
                        <li><a href="imageview.php">View Images</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>INDUSTRY
                            PAGE HEADINGS</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="industryadd.php">Add Content</a></li>
                        <li><a href="industryview.php">View Content</a></li>
                        <li><a href="title.php">Add Title</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>INDUSTRY
                            PAGE CONTENT</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add3.php">Add Content</a></li>
                        <li><a href="view3.php">View Content</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="lni-add-file"></i><span>CONTACT
                            PAGE</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="contactcontentadd.php">Add Content</a></li>
                        <li><a href="contactcontentview.php">View Content</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="main-content">
            <div class="top-header">
                <div class="row">
                    <div class="nav-btn-area">
                        <div class="clearfix"></div>
                        <div id="sidebarCollapse" class="nav-btn float-left p-t-15">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="custom-menu">
                            <nav class="navbar no-padding navbar-expand-sm float-right">
                                <ul>
                                    <li class="p-r-0">
                                        <a href="#" data-toggle="dropdown"><img class="rounded-circle w-30"
                                                src="images/widget/1.png" alt="User"></a>
                                        <div class="user-dropdown dropdown-menu">
                                            <a href="logout.php"><i class="lni-unlock"></i> Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>