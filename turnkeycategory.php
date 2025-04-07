<?php
include("header.php");
?>

<!-- main-area -->
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <?php
include("config.php");
$query = "SELECT * FROM turnkeybanner";
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
    <section class="blog__post-area-three section-py-120">
        <div class="container">
            <div class="row gutter-24">
                <?php
                                                    include("config.php");
                                                    $categoryQuery = "SELECT * FROM turncategory";
                                                    $categoryResult = $conn->query($categoryQuery);

                                                    if ($categoryResult->num_rows > 0) {
                                                        while ($row = $categoryResult->fetch_assoc()) {
                                                            
                                                            ?>
                <div class="col-lg-3">
                    <div class="blog__post-item-three">
                         <a href="turnsubcat.php?id=<?php echo $row['id']; ?>">
                        <div class="blog__post-content-three" style="height: 250px;width: 300px;">
                            <p class="title" style="font-size:20px;"><?php echo $row['cat_name']; ?></p>
                    
                        </div>
                        </a>
                    </div>
                </div>

                <?php
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