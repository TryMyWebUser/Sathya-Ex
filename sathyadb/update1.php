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
    $productName = mysqli_real_escape_string($conn, $_POST["productname"]);
    $subcat_name = mysqli_real_escape_string($conn, $_POST["subcat_name"]);
    $description = mysqli_real_escape_string($conn, $_POST["Description"]);
    $readmore = mysqli_real_escape_string($conn, $_POST["readmore"]);
    $categoryName = $_POST["categoryName"];

    // Query to get category ID
    $categoryQuery = "SELECT id FROM turncategory WHERE cat_name = '$categoryName'";
    $categoryResult = $conn->query($categoryQuery);

    // Query to get subcategory ID
    $subcategoryQuery = "SELECT subcat_id FROM turnsubcat WHERE subcat_name = '$subcat_name'";
    $subcategoryResult = $conn->query($subcategoryQuery);

    if ($categoryResult && $subcategoryResult) {
        if ($categoryResult->num_rows > 0 && $subcategoryResult->num_rows > 0) {
            $categoryRow = $categoryResult->fetch_assoc();
            $subcategoryRow = $subcategoryResult->fetch_assoc();
            $categoryId = $categoryRow['id'];
            $subcatId = $subcategoryRow['subcat_id'];

            $updateSql = "UPDATE turnproducts 
                          SET name = '$productName', 
                              description = '$description', 
                              read_more = '$readmore', 
                              cat_id = '$categoryId', 
                              cat_name = '$categoryName', 
                              subcat_id = '$subcatId', 
                              subcat_name = '$subcat_name' 
                          WHERE prod_id = '$id'";

            if ($conn->query($updateSql)) {
                echo "<script>
                      Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Record updated successfully!'
                      }).then(() => {
                          window.location.href = 'view1.php';
                      });
                      </script>";
            } else {
                echo "<script>
                      Swal.fire({
                          icon: 'error',
                          title: 'Error!',
                          text: 'Failed to Update! Try Again Later',
                          showConfirmButton: true, 
                          confirmButtonText: 'OK'
                      }).then(() => {
                          window.location.href = 'update.php';
                      });
                      </script>";
            }
        } else {
            echo "<script>
                  Swal.fire({
                      icon: 'error',
                      title: 'Error!',
                      text: 'Category or Subcategory not found',
                      showConfirmButton: true, 
                      confirmButtonText: 'OK'
                  }).then(() => {
                      window.location.href = 'update.php';
                  });
                  </script>";
        }
    } else {
        echo "<script>
              Swal.fire({
                  icon: 'error',
                  title: 'Error!',
                  text: 'Database error: " . $conn->error . "',
                  showConfirmButton: true, 
                  confirmButtonText: 'OK'
              }).then(() => {
                  window.location.href = 'update.php';
              });
              </script>";
    }
}
?>

<!--**********************************
            Content body start
 ***********************************-->

<div class="content-body">
    <div class="container-fluid">
        <div class="row m-5">
            <div class="col-lg-12">
                <div class="card bg-white p-5">
                    <h2 class="mb-4">Trun Key Solutions Update</h2>
                    <form method="POST" enctype="multipart/form-data" class="p-5">
                        <?php
                            include("config.php");
                            $id = $_GET['update'];
                            $productQuery = "SELECT * FROM turnproducts WHERE prod_id = '$id'";
                            $productResult = $conn->query($productQuery);

                            if ($productResult->num_rows > 0) {
                                $row = $productResult->fetch_assoc();
                                $categoryName = $row['cat_name'];
                                $subcategoryName = $row['subcat_name'];
                                $productName = $row['name'];
                                $description = $row['description'];
                            ?>
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <select class="default-select form-control wide mb-3" name="categoryName">
                                <option selected disabled>Select a category</option>
                                <?php
                                $categoryQuery = "SELECT * FROM turncategory";
                                $categoryResult = $conn->query($categoryQuery);
                                if ($categoryResult->num_rows > 0) {
                                    while ($catRow = $categoryResult->fetch_assoc()) {
                                        $selected = ($catRow['cat_name'] == $categoryName) ? "selected" : "";
                                        echo "<option value='" . $catRow['cat_name'] . "' $selected>" . $catRow['cat_name'] . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No categories available</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subcategoryName" class="form-label">SubCategory Name</label>
                            <select class="default-select form-control wide mb-3" name="subcat_name">
                                <option selected disabled>Select a SubCategory</option>
                                <?php
                                $subcategoryQuery = "SELECT * FROM turnsubcat";
                                $subcategoryResult = $conn->query($subcategoryQuery);
                                if ($subcategoryResult->num_rows > 0) {
                                    while ($subcatRow = $subcategoryResult->fetch_assoc()) {
                                        $selected = ($subcatRow['subcat_name'] == $subcategoryName) ? "selected" : "";
                                        echo "<option value='" . $subcatRow['subcat_name'] . "' $selected>" . $subcatRow['subcat_name'] . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No subcategories available</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="position-relative form-group">
                            <label for="productName" class="">Product Name</label>
                            <input name="productname" id="productName" placeholder="Enter the Name" type="text"
                                value="<?php echo $productName; ?>" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="productDescription" class="">Description</label>
                            <textarea class="form-control" name="Description" rows="5" col="5"
                                required><?php echo $description; ?></textarea>
                        </div>
                        <div class="position-relative form-group">
                            <label for="readmoreContent" class="">Read More Content</label>
                            <textarea class="form-control" id="editor" name="readmore" rows="5" col="5"
                                required><?php echo $row['read_more']; ?></textarea>
                        </div>
                        <?php
                        } else {
                            echo "<div>No product found with the given ID.</div>";
                        }
                        ?>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <a href="view1.php" class="btn btn-primary">View</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>