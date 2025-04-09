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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $display = mysqli_real_escape_string($conn, $_POST["display"]);
    $dec = mysqli_real_escape_string($conn, $_POST["dec"]);
    
    // Check if a file is selected
    if (isset($_FILES['logo2']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK) {
        $aimage = $_FILES['logo2']['name'];
        $fname = $_FILES['logo2']['tmp_name'];

        // Ensure the 'gallery' directory exists
        if (!is_dir('gallery/')) {
            mkdir('gallery/');
        }

        // Move uploaded file to the 'gallery' directory
        $newfname2 = 'gallery/' . basename($aimage);
        if (move_uploaded_file($fname, $newfname2)) {
            // Insert the image filename into the database
            $insertSql = "INSERT INTO images (image, name, position, `dec`) VALUES ('$aimage', '$name', '$display', '$dec')";
            
            if ($conn->query($insertSql)) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Record inserted successfully!',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'imageadd.php';
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
                        window.location.href = 'imageadd.php';
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
                    window.location.href = 'imageadd.php';
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
                window.location.href = 'imageadd.php';
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
                    <li><span>Gallery Image</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Gallery Image</h3>
            </div>
            <div class="card-body m-t-15">
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Product
                            Name</label>
                        <input type="text" class="form-control" id="productImage" name="name">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Product
                        Description</label>
                        <textarea class="form-control" id="editor" name="dec" rows="5" col="5"></textarea>
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Product
                            Image</label>
                        <input type="file" class="form-control" id="productImage" name="logo2">
                    </div>
                    <div class="position-relative form-group">
                        <label class="form-label" style="color: black; font-weight:bold">Position of the
                            Image</label><br>
                        <input type="radio" id="index" name="display" value="index">
                        <label for="index">Index</label><br>
                        <input type="radio" id="gallery" name="display" value="gallery">
                        <label for="both">Gallery</label><br>
                        <input type="radio" id="both" name="display" value="both">
                        <label for="both">Both</label><br>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>