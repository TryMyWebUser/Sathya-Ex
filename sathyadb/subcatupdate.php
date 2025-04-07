<?php
session_start();
include("config.php");	
if (!isset( $_SESSION['email_admin'])) {
    header("Location: login.php");
    exit();
}
?>
<?php include("header.php"); ?>
<?php
include("config.php");
if (isset($_POST["submit"])) {
    $id = $_GET['update'];
    $cat_name = mysqli_real_escape_string($conn, $_POST["cat_name"]);
    $subcat_name = mysqli_real_escape_string($conn, $_POST["subcat_name"]);

    // Fetch the cat_id corresponding to the selected cat_name
    $catIdQuery = "SELECT id FROM category WHERE cat_name = '$cat_name'";
    $catIdResult = $conn->query($catIdQuery);
    
    if ($catIdResult) {
        // Check if a matching category is found
        if ($catIdResult->num_rows > 0) {
            $row = $catIdResult->fetch_assoc();
            $cat_id = $row['id'];

            // Update data in the database
            $updateSql = "UPDATE prodsubcat SET cat_id = '$cat_id', cat_name = '$cat_name', subcat_name = '$subcat_name'
             WHERE subcat_id = '$id'";
            
            if ($conn->query($updateSql)) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Record updated successfully!',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'subcatview.php';
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error updating record: " . $conn->error . "',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'subcatview.php';
                    });
                </script>";
            }
        } else {
            // If no matching category is found
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Invalid category selected',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'subcatview.php';
                });
            </script>";
        }
    } else {
        // If there's an error in the query execution
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Database error: " . $conn->error . "',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'subcatview.php';
            });
        </script>";
    }
}
?>

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12 col-lg-12 col-md-12 col-12">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs float-right">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Products SubCategory</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Products SubCategory</h3>
            </div>
            <div class="card-body m-t-15">
                <?php
                    include("config.php");
                    if (isset($_GET['update'])) {
                        $pid = $_GET['update'];
                        $sql = "SELECT * FROM prodsubcat WHERE subcat_id = $pid";
                        $query = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($query);
                        $subcat_name = $row['subcat_name']; 
                        $cat_name = $row['cat_name'];
                    }
                    ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="productCategory" class="form-label"
                            style="color: black; font-weight:bold">Category</label>
                        <select class="form-control" id="productCategory" name="cat_name">
                            <option value="" selected disabled>SELECT CATEGORY</option>
                            <?php
                            include("config.php");
                            $categoryQuery = "SELECT * FROM category";
                            $categoryResult = $conn->query($categoryQuery);
                            if ($categoryResult->num_rows > 0) {
                                while ($cat_row = $categoryResult->fetch_assoc()) {
                                    $selected = ($cat_name == $cat_row['cat_name']) ? 'selected' : '';
                                    echo '<option value="' . $cat_row['cat_name'] . '" ' . $selected . '>' . $cat_row['cat_name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Sub
                            Category</label>
                        <input type="text" class="form-control" id="productImage" name="subcat_name"
                            value="<?php echo $subcat_name; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>