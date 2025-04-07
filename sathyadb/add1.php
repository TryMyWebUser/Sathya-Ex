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
    $productName = mysqli_real_escape_string($conn, $_POST["productname"]);
    $description = mysqli_real_escape_string($conn, $_POST["Description"]);
    $readmore = mysqli_real_escape_string($conn, $_POST["readmore"]);
    $categoryName = $_POST["categoryName"];
    $subcat_name = $_POST["subcat_name"];

    $categoryQuery = "SELECT id FROM turncategory WHERE cat_name = '$categoryName'";
    $categoryResult = $conn->query($categoryQuery);
    
    if ($categoryResult && $categoryResult->num_rows > 0) {
        $row = $categoryResult->fetch_assoc();
        $categoryId = $row['id'];
  
        $subcatQuery = "SELECT subcat_id FROM turnsubcat WHERE subcat_name = '$subcat_name'";
        $subcatResult = $conn->query($subcatQuery);
        
        if ($subcatResult && $subcatResult->num_rows > 0) {
            $subcatRow = $subcatResult->fetch_assoc();
            $subcatId = $subcatRow['subcat_id'];
            
            // Insert product into database
            $insertSql = "INSERT INTO turnproducts (name, description, read_more, cat_id, cat_name, subcat_id, subcat_name) 
                          VALUES ('$productName', '$description', '$readmore', '$categoryId', '$categoryName', '$subcatId', '$subcat_name')";

            if ($conn->query($insertSql)) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Record Inserted successfully!'
                }).then(() => {
                    window.location.href = 'add1.php';
                });
            </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to Add! Try Again Later',
                    showConfirmButton: true, 
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'add1.php';
                });
                </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Subcategory not found',
                showConfirmButton: true, 
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'add1.php';
            });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Category not found',
            showConfirmButton: true, 
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'add1.php';
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
                    <li><span>Turn Key Solutions</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Turn Key Solutions</h3>
            </div>
            <div class="card-body m-t-15">
                <form method="POST" enctype="multipart/form-data">
                    <?php
                    include("config.php");
                    $categoryQuery = "SELECT id, cat_name FROM turncategory";
                    $categoryResult = $conn->query($categoryQuery);
                    ?>

                    <div class="position-relative form-group">
                        <label for="categoryName" class="form-label" style="color: black; font-weight:bold">Category
                            Name</label>
                        <select class="default-select form-control wide mb-3" name="categoryName">
                            <option selected disabled>Select a category</option>
                            <?php
                                          if ($categoryResult->num_rows > 0) {
                                         while ($row = $categoryResult->fetch_assoc()) {
                                         echo "<option value='" . $row['cat_name'] . "'>" . $row['cat_name'] . "</option>";
                                                }
                                                } else {
                                                 echo "<option disabled>No categories available</option>";
                                                   }
                                               ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <?php
                    include("config.php");
                    $categoryQuery = "SELECT subcat_id, subcat_name FROM turnsubcat";
                    $categoryResult = $conn->query($categoryQuery);
                    ?>
                        <label for="categoryName" class="form-label" style="color: black; font-weight:bold">SubCategory
                            Name</label>
                        <select class="default-select form-control wide mb-3" name="subcat_name">
                            <option selected disabled>Select a Subcategory</option>
                            <?php
                                          if ($categoryResult->num_rows > 0) {
                                         while ($row = $categoryResult->fetch_assoc()) {
                                         echo "<option value='" . $row['subcat_name'] . "'>" . $row['subcat_name'] . "</option>";
                                                }
                                                } else {
                                                 echo "<option disabled>No Subcategories available</option>";
                                                   }
                                               ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label for="exname" class="" style="color: black; font-weight:bold">Product Name</label>
                        <input name="productname" id="" placeholder="Enter the Name" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="exdes" class="" style="color: black; font-weight:bold">Description</label>
                        <textarea class="form-control" id="" name="Description" rows="5" col="5"></textarea>
                    </div>
                    <div class="position-relative form-group">
                        <label for="exdes1" class="" style="color: black; font-weight:bold">Read More Content</label>
                        <textarea class="form-control" id="editor" name="readmore" rows="5" col="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>