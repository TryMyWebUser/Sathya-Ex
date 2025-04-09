<?php
include("header.php");

if (empty($_GET['sub'])) {
    header("Location: industry.php");
    exit;
}

?>



<!-- main-area -->
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <?php
include("config.php");
$query = "SELECT * FROM indbanner";
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

    <section class="about__area-four grey-bg section-py-120">
        <div class="container">
            <div class="row gutter-24 justify-content-center align-items-center">
                <?php
                    include("config.php");
                    $cate = $_GET['sub'];
                    $categoryQuery = "SELECT * FROM industry WHERE heading1 = '$cate'";
                    $categoryResult = $conn->query($categoryQuery);
                    
                    if ($categoryResult->num_rows > 0) {
                        while ($row = $categoryResult->fetch_assoc()) {
                            $subindustry = 'sathyadb/subindu/' . $row['image_name'];
                ?>
                <div class="col-lg-6 col-md-10">
                    <div class="about__img-four wow img-custom-anim-left  animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: img-anim-left;">
                        <img src="<?= $subindustry; ?>" alt="img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content-four">
                        <div class="section__title section__title-three mb-30">
                            <h2 class="title"><?= $row['heading2'] ?></h2>
                        </div>
                        <?= $row['description'] ?>
                    </div>
                </div>
                <?php
                        }
                    } else {
                        echo "<p>No data found in the industry table.</p>";
                    }
                ?>
            </div>
        </div>
    </section>

</main>
<!-- main-area-end -->

<?php
include("footer.php");
?>