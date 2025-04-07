<?php
include("header.php");
?>
<!-- main-area -->
<main class="main-area fix">
    <!-- breadcrumb-area -->
    <?php
include("config.php");
$query = "SELECT * FROM turncontban";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $aimage1 = 'sathyadb/pics/' . $row['image'];
    echo '<div class="breadcrumb__area breadcrumb__bg" data-background=" '.$aimage1.'">';
    } else {
        echo "No data found in the aboutbanner table.";
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__content">
                    <?php
                            include('config.php');
                            if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
                                $productId = $_GET["id"];
                                $stmt = $conn->prepare("SELECT * FROM turnproducts WHERE prod_id = ?");
                                $stmt->bind_param("i", $productId);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                                    echo '<h2 class="title">'.$row["subcat_name"].'</h2>';
                                                    echo ' <nav class="breadcrumb">';
                                                    echo ' <span property="itemListElement" typeof="ListItem">';
                                                    echo '<a href="index.php">Home</a>';
                                                    echo ' </span>';
                                                    echo '<span class="breadcrumb-separator">/</span>';
                                                    echo '  <span property="itemListElement" typeof="ListItem">'.$row["subcat_name"].'</span>';
                                                    echo ' </nav>';
                                }
                            }
                                ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- blog-details-area -->
    <section class="blog__details-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details-content">
                        <?php
                        include('config.php');
                        if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
                            $productId = $_GET["id"];
                            $stmt = $conn->prepare("SELECT * FROM turnproducts WHERE prod_id = ?");
                            $stmt->bind_param("i", $productId);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<p style='text-transform:uppercase;'>{$row['read_more']}</p>";
                                }
                            } else {
                                echo "No product found with the provided ID.";
                            }
                            $stmt->close();
                        } else {
                            echo "Invalid 'id' parameter.";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->
</main>
<!-- main-area-end -->

<?php
include("footer.php");
?>