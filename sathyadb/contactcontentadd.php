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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $head1 = mysqli_real_escape_string($conn, $_POST["head1"]);
    $head2 = mysqli_real_escape_string($conn, $_POST["head2"]);
    $head3 = mysqli_real_escape_string($conn, $_POST["head3"]);

    $img1 = "";
    $img2 = "";
    $img3 = "";
    
    if (isset($_FILES['logo1']) && $_FILES['logo1']['error'] === UPLOAD_ERR_OK) {
        $img1 = $_FILES['logo1']['name'];
        $fname1 = $_FILES['logo1']['tmp_name'];
    }
    
    if (isset($_FILES['logo2']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK) {
        $img2 = $_FILES['logo2']['name'];
        $fname2 = $_FILES['logo2']['tmp_name'];
    }
    
    if (isset($_FILES['logo3']) && $_FILES['logo3']['error'] === UPLOAD_ERR_OK) {
        $img3 = $_FILES['logo3']['name'];
        $fname3 = $_FILES['logo3']['tmp_name'];
    }

    if (!is_dir('cimages/')) {
        mkdir('cimages/');
    }

    $insertSql = "INSERT INTO contactcontent (img1, heading1, img2, heading2, img3, heading3) 
    VALUES ('$img1', '$head1', '$img2', '$head2', '$img3', '$head3')";
    
    if ($conn->query($insertSql)) {
        // Move files to the 'about_images' directory
        if ($img1 != "" && move_uploaded_file($fname1, 'cimages/' . $img1) &&
            $img2 != "" && move_uploaded_file($fname2, 'cimages/' . $img2) &&
            $img3 != "" && move_uploaded_file($fname3, 'cimages/' . $img3)) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Record inserted successfully!'
                }).then(() => {
                    window.location.href = 'contactcontentadd.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error uploading files.',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'contactcontentadd.php';
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error inserting record: " . $conn->error . "',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'contactcontentadd.php';
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
                    <li><span>Contact Page</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Contact Page</h3>
            </div>
            <div class="card-body m-t-15">
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="font-weight:bold; color:black;">Location
                            Image</label>
                        <input type="file" class="form-control" id="productImage" name="logo1">
                    </div>
                    <div class="position-relative form-group">
                        <label for="heading" class="" style="font-weight:bold; color:black;">Location </label>
                        <input name="head1" id="" placeholder="Enter the Name" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="font-weight:bold; color:black;">Contact
                            Image</label>
                        <input type="file" class="form-control" id="productImage" name="logo2">
                    </div>
                    <div class="position-relative form-group">
                        <label for="heading" class="" style="font-weight:bold; color:black;">Contact Number</label>
                        <input name="head2" id="" placeholder="Enter the Name" type="text" class="form-control">
                    </div>

                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="font-weight:bold; color:black;">Email ID
                            Image</label>
                        <input type="file" class="form-control" id="productImage" name="logo3">
                    </div>
                    <div class="position-relative form-group">
                        <label for="heading" class="" style="font-weight:bold; color:black;">Email ID</label>
                        <input name="head3" id="" placeholder="Enter the Name" type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>