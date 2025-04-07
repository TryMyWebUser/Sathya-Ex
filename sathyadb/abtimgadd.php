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
    $experience = mysqli_real_escape_string($conn, $_POST["heading1"]);
    $head = mysqli_real_escape_string($conn, $_POST["head"]);
    $des = mysqli_real_escape_string($conn, $_POST["des"]);

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

    if (!is_dir('about_images/')) {
        mkdir('about_images/');
    }

    $insertSql = "INSERT INTO about_images (experience, img1, img2, img3, heading, description) 
    VALUES ('$experience', '$img1', '$img2', '$img3', '$head', '$des')";
    
    if ($conn->query($insertSql)) {
        // Move files to the 'about_images' directory
        if ($img1 != "" && move_uploaded_file($fname1, 'about_images/' . $img1) &&
            $img2 != "" && move_uploaded_file($fname2, 'about_images/' . $img2) &&
            $img3 != "" && move_uploaded_file($fname3, 'about_images/' . $img3)) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Record inserted successfully!'
                }).then(() => {
                    window.location.href = 'abtimgadd.php';
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
                    window.location.href = 'abtimgadd.php';
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
                window.location.href = 'abtimgadd.php';
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
                    <li><span>About Section</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">About Section</h3>
            </div>
            <div class="card-body m-t-15">
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label"
                            style="font-weight:bold; color:black;">Experience</label>
                        <input type="text" class="form-control" id="productImage" name="heading1">
                    </div>
                    <div class="position-relative form-group">
                        <label for="heading" class="" style="font-weight:bold; color:black;">About Heading</label>
                        <input name="head" id="" placeholder="Enter the Name" type="text" class="form-control">
                    </div>

                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label"
                            style="font-weight:bold; color:black;">Image1</label>
                        <input type="file" class="form-control" id="productImage" name="logo1">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label"
                            style="font-weight:bold; color:black;">Image2</label>
                        <input type="file" class="form-control" id="productImage" name="logo2">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label"
                            style="font-weight:bold; color:black;">Image3</label>
                        <input type="file" class="form-control" id="productImage" name="logo3">
                    </div>
                    <div class="position-relative form-group">
                        <label for="exdes" class="" style="font-weight:bold; color:black;">Description</label>
                        <textarea class="form-control" id="editor" name="des" rows="5" col="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>