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
    // Escape user inputs for security
    $heading1 = mysqli_real_escape_string($conn, $_POST["heading1"]);
    $heading2 = mysqli_real_escape_string($conn, $_POST["heading2"]);
    $listItem = mysqli_real_escape_string($conn, $_POST["list"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    // Check if a file is selected
    if (isset($_FILES['logo2']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['logo2']['name'];
        $tmpName = $_FILES['logo2']['tmp_name'];

        // Ensure the 'gallery' directory exists
        if (!is_dir('feature/')) {
            mkdir('feature/');
        }

        // Move uploaded file to the 'gallery' directory
        $newImageName = 'feature/' . basename($imageName);
        if (move_uploaded_file($tmpName, $newImageName)) {
            // Insert the image filename and other details into the database
            $insertSql = "INSERT INTO feature (main_heading, sub_heading, list, image, title) 
                          VALUES ('$heading1', '$heading2', '$listItem', '$imageName', '$title')";
            
            if ($conn->query($insertSql)) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Record inserted successfully!',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'featureadd.php';
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
                        window.location.href = 'featureadd.php';
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
                    window.location.href = 'featureadd.php';
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
                window.location.href = 'featureadd.php';
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
                    <li><span>Faeture Section Content</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Faeture Section Content</h3>
            </div>
            <div class="card-body m-t-15">
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Main Heading
                        </label>
                        <input type="text" class="form-control" id="productImage" name="heading1">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Sub Heading
                        </label>
                        <input type="text" class="form-control" id="productImage" name="heading2">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">List Item
                        </label>
                        <input type="text" class="form-control" id="productImage" name="list">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Title of the
                            Image
                        </label>
                        <input type="text" class="form-control" id="productImage" name="title">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">
                            Image</label>
                        <input type="file" class="form-control" id="productImage" name="logo2">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>