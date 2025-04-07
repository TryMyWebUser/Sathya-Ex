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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);

    if (isset($_FILES['logo2']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK) {
        $aimage = $_FILES['logo2']['name'];
        $fname = $_FILES['logo2']['tmp_name'];
        if (!is_dir('product_category/')) {
            mkdir('product_category/');
        }
        $newfname2 = 'product_category/' . basename($aimage);
        if (move_uploaded_file($fname, $newfname2)) {
  
            $insertSql = "INSERT INTO product_category (image, name) VALUES ('$aimage', '$name')";
            
            if ($conn->query($insertSql)) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Record inserted successfully!',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'contentadd.php';
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error inserting record: " . $conn->error . "',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'contentadd.php';
                    });
                </script>";
            }
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Sorry, there was an error uploading your file.',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'contentadd.php';
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Please select a file to upload',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'contentadd.php';
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
                    <li><span>Product Category</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Product Category</h3>
            </div>
            <div class="card-body m-t-15">
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Product
                            Category Name</label>
                        <input type="text" class="form-control" id="productImage" name="name">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Product
                            Category Image</label>
                        <input type="file" class="form-control" id="productImage" name="logo2">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>