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
        $aimage1 = 'sathyadb/pics/' . $row['image'];
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
            <div class="row justify-content-center gutter-24 gallery-container">
                <?php
                include("config.php");
                $result = $conn->query("SELECT * FROM images");
                if ($result) {
                    $images = array();
                    while ($row = $result->fetch_assoc()) {
                        $images[] = $row;
                        echo '<div class="col-lg-4 col-md-6">';
                        echo '<div class="blog__post-item shine__animate-item">';
                        echo '<div class="blog__post-thumb">';
                        echo '<a href="javascript:void(0)" class="shine__animate-link gallery-item" data-index="'.(count($images)-1).'">';
                        $imagePath = "sathyadb/gallery/" . $row['image'];
                        echo '<img src="' . $imagePath . '" style="width: 510px; height: 250px;" alt="' . $row['image'] . '">';
                        echo '</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    // Store images array for JavaScript
                    echo '<script>var galleryImages = '.json_encode($images).';</script>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="galleryModal" class="modal">
        <span class="close">&times;</span>
        <span class="prev">&#10094;</span>
        <span class="next">&#10095;</span>
        <div class="modal-content">
            <img id="modalImage" src="" alt="">
        </div>
        <div id="caption"></div>
    </div>

    <!-- blog-post-area-end -->

</main>
<!-- main-area-end -->

<style>
    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.9);
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    #modalImage {
        width: 100%;
        height: auto;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        cursor: pointer;
    }

    .close:hover {
        color: #bbb;
    }

    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev {
        left: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the modal
        var modal = document.getElementById('galleryModal');
        var modalImg = document.getElementById('modalImage');
        var captionText = document.getElementById('caption');
        var currentIndex = 0;

        // When the user clicks on an image, open the modal
        var galleryItems = document.getElementsByClassName('gallery-item');
        for (var i = 0; i < galleryItems.length; i++) {
            galleryItems[i].onclick = function() {
                currentIndex = parseInt(this.getAttribute('data-index'));
                openModal(currentIndex);
            }
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Next/previous controls
        document.getElementsByClassName('prev')[0].onclick = function() {
            currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
            openModal(currentIndex);
        }

        document.getElementsByClassName('next')[0].onclick = function() {
            currentIndex = (currentIndex + 1) % galleryImages.length;
            openModal(currentIndex);
        }

        // Keyboard navigation
        document.onkeydown = function(e) {
            e = e || window.event;
            if (modal.style.display === "block") {
                if (e.keyCode === 37) { // left arrow
                    currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
                    openModal(currentIndex);
                } else if (e.keyCode === 39) { // right arrow
                    currentIndex = (currentIndex + 1) % galleryImages.length;
                    openModal(currentIndex);
                } else if (e.keyCode === 27) { // escape
                    modal.style.display = "none";
                }
            }
        };

        function openModal(index) {
            modal.style.display = "block";
            var imagePath = "sathyadb/gallery/" + galleryImages[index].image;
            modalImg.src = imagePath;
            captionText.innerHTML = galleryImages[index].dec || '';
        }
    });
</script>

<?php
include("footer.php");
?>