<?php
include("header.php");
?>



<!-- main-area -->
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <?php
include("config.php");
$query = "SELECT * FROM galbanner";
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

    <!-- blog-post-area -->
    <section class="blog__post-area-two section-pt-120 section-pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section__title section__title-three text-center mb-60">
                        <h2 class="title">Gallery</h2>
                        <p> Browse through the latest tailor-made solutions deployed in projects. We go the extra mile
                            in making sure the strenuous needs of each industry are met through our high quality
                            coatings. Our products have achieved success in numerous manufacturing industries including
                            automobiles, shipping, and more. </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gutter-24">
                <?php
            include("config.php");
            $result = $conn->query("SELECT * FROM images");
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6">';
                    echo '<div class="blog__post-item shine__animate-item">';
                    echo '<div class="blog__post-thumb">';
                    echo '<a href="" class="shine__animate-link">';
                    $imagePath = "../sathyadb/gallery/" . $row['image'];
                    echo '<img src="' . $imagePath . '" style="width: 510px; height: 250px;" alt="' . $row['image'] . '">';
                    echo '</a>';
                    echo '</div>';
                    // echo '  <div class="services__content-two services__content-six">';
                    // echo ' <h4 class="title"><a href="gallery.php">'.$row['name'].'</a></h4>';
                    // echo ' </div>';
                    echo ' </div>';
                    echo '</div>';
                    }
                    }
                    ?>
            </div>
        </div>
    </section>

    <!-- blog-post-area-end -->



</main>
<!-- main-area-end -->

<?php
include("footer.php");
?>