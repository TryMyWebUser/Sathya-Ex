<?php
session_start();
include("config.php");	
if (!isset( $_SESSION['email_admin'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
include("header.php");

include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'update' parameter is set in the URL
    if(isset($_GET['update'])) {
        $imageid = $_GET['update'];
        
        // Get form data
        $name = $_POST['name'];
        $display = $_POST['display'];
        
        // Check if a new image file is uploaded
        if(isset($_FILES['logo2']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK) {
            $aimage = $_FILES['logo2']['name'];
            $fname2 = $_FILES['logo2']['tmp_name'];
            $newfname2 = basename($aimage);
            $targetDir = 'gallery/';

            // Ensure the target directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir);
            }

            // Move uploaded file to the target directory
            if(move_uploaded_file($fname2, $targetDir . $newfname2)) {
                // Update product data in the database with new image
                $updateSql = "UPDATE images SET image = '$newfname2', name = '$name', position = '$display' WHERE i_id = '$imageid'";
            } else {
                // Error moving uploaded file
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to move uploaded file.'
                }).then(() => {
                    window.location.href = 'imageupdate.php?update=$imageid';
                });
                </script>";
                exit();
            }
        } else {
            // No new image file uploaded, update only name
            $updateSql = "UPDATE images SET name = '$name', position = '$display' WHERE i_id = '$imageid'";
        }
        
        // Execute update query
        if ($conn->query($updateSql)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Record updated successfully!'
            }).then(() => {
                window.location.href = 'imageview.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error updating record: {$conn->error}'
            }).then(() => {
                window.location.href = 'imageupdate.php?update=$imageid';
            });
            </script>";
        }
    } else {
        // 'update' parameter is not set
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Invalid update parameter.'
        }).then(() => {
            window.location.href = 'imageupdate.php';
        });
        </script>";
    }
}
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-primary">
                    <h3 class="text-white text-center p-2"></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-5">
            <div class="col-lg-12">
                <div class="card bg-white p-5">
                    <?php
                        include("config.php");
                        $imageid = $_GET['update'];
                        $productQuery = "SELECT * FROM images WHERE i_id = '$imageid'";
                        $productResult = $conn->query($productQuery);

                        if ($productResult->num_rows > 0) {
                            $row = $productResult->fetch_assoc();

                            $aimage = 'gallery/' . $row['image'];
                            $name =  $row['name'];
                            $position =  $row['position'];
                            $display = $row['position'];
                        }
                        ?>
                    <h2 class="mb-4">Gallery Image</h2>
                    <form method="POST" enctype="multipart/form-data" class="p-5">
                        <div class="position-relative form-group">
                            <label for="productImage" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productImage" name="name"
                                value="<?php echo $name; ?>">
                        </div>
                        <div class="position-relative form-group">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="logo2">
                            <img src="<?php echo $aimage; ?>" style="width:100px; height:50px;">
                        </div>
                        <div class="position-relative form-group">
                            <label class="form-label" style="color: black; font-weight:bold">Position of the
                                Image</label><br>
                            <input type="radio" id="index" name="display" value="index"
                                <?php if ($display == 'index') echo 'checked'; ?>>
                            <label for="index">Index</label><br>
                            <input type="radio" id="gallery" name="display" value="gallery"
                                <?php if ($display == 'gallery') echo 'checked'; ?>>
                            <label for="gallery">Gallery</label><br>
                            <input type="radio" id="both" name="display" value="both"
                                <?php if ($display == 'both') echo 'checked'; ?>>
                            <label for="both">Both</label><br>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <a href="imageview.php" class="btn btn-primary">View</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>