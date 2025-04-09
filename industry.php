<?php
include("header.php");
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

    <!-- counter-area -->
    <section class="counter__area-three section-pt-120 section-pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title section__title-three mb-60">
                        <?php
                    include("config.php");
                    $categoryQuery = "SELECT * FROM industry_page";
                    $categoryResult = $conn->query($categoryQuery);

                    if ($categoryResult->num_rows > 0) {
                        while ($row = $categoryResult->fetch_assoc()) {
                ?>
                        <span class="title"><?php echo $row['heading1']?></span>
                        <h2 class="sub-title" style="font-size: 20px;"><?php echo $row['heading2']?></h2>
                        <p class="sub-title" style="font-size: 25px;"><?php echo $row['heading3']?></p>
                        <?php
                        }}
                        ?>
                    </div>
                </div>
            </div>
            <div class="row gutter-24">
                <?php
                    include("config.php");
                    $categoryQuery = "SELECT * FROM title";
                    $categoryResult = $conn->query($categoryQuery);

                    if ($categoryResult->num_rows > 0) {
                        while ($row = $categoryResult->fetch_assoc()) {
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter__item-three">
                        <div class="counter__icon-three">
                            <i class="renova-group"></i>
                        </div>
                        <div class="counter__content-three">
                            <a href="subindustry.php?sub=<?php echo $row['cat_name']?>" style="color: #000;"><b><?php echo $row['cat_name']?></b></a>
                        </div>
                    </div>
                </div>
                <?php
                            }}
                            ?>
            </div>
        </div>
    </section>
    <!-- counter-area-end -->

</main>
<!-- main-area-end -->

<?php
include("footer.php");
?>