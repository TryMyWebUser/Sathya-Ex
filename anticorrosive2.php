<?php
include("header.php");
?>

<!-- main-area -->
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <?php
include("config.php");
$query = "SELECT * FROM turnsubcatban";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $aimage1 = '../sathyadb/pics/' . $row['image'];
    echo '<div class="breadcrumb__area breadcrumb__bg" data-background=" '.$aimage1.'">';
    } else {
        echo "No data found in the aboutbanner table.";
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__content">
                    <h2 class="title">
                        <?php
                                include('config.php');
                                if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
                                    $categoryId = $_GET["id"];
                                    $stmt = $conn->prepare("SELECT * FROM turnsubcat WHERE subcat_id = ?");
                                    $stmt->bind_param("i", $categoryId);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<h2>{$row['subcat_name']}</h2>";
                                        }
                                    } else {
                                        echo "No results found.";
                                    }
                                    $stmt->close();
                                } else {
                                    echo "Invalid 'id' parameter.";
                                }
                                $conn->close();
                                ?>
                    </h2>
                    <nav class="breadcrumb">
                        <span property="itemListElement" typeof="ListItem">
                            <a href="index.php">Home</a>
                        </span>
                        <span class="breadcrumb-separator">/</span>
                        <span property="itemListElement" typeof="ListItem">
                            <?php
                                    include('config.php');
                                    if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
                                        $categoryId = $_GET["id"];
                                        $stmt = $conn->prepare("SELECT * FROM turnsubcat WHERE subcat_id = ?");

                                        $stmt->bind_param("i", $categoryId);

                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<span>{$row['subcat_name']}</span>";
                                            }
                                        } else {
                                            echo "No results found.";
                                        }
                                        $stmt->close();
                                    } else {
                                        echo "Invalid 'id' parameter.";
                                    }
                                    $conn->close();
                                    ?>
                        </span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- blog-post-area -->
    <section class="blog__post-area-three section-py-120">
        <div class="container">
            <div class="row gutter-24">
                <?php
            include('config.php');
            if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
                $categoryId = $_GET["id"];
                $stmt = $conn->prepare("SELECT * FROM turnproducts WHERE subcat_id = ?");
                $stmt->bind_param("i", $categoryId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col-lg-6'>";
                        echo "<div class='blog__post-item-three'>";
                        echo "<div class='blog__post-content-three'>";
                        echo "<h2>{$row['name']}</h2>";
                        echo "<p>{$row['description']}</p>";
                        echo "<a href='primers2.php?id=" . $row['prod_id'] . "' class='btn btn-two'>Read Details</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='col-lg-12'>";
                    echo "No results found.";
                    echo "</div>";
                }
                $stmt->close();
            } else {
                echo "<div class='col-lg-12'>";
                echo "Invalid 'id' parameter.";
                echo "</div>";
            }
            $conn->close();
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