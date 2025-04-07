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
        $heading1 = $_POST['heading1'];
        $heading2 = $_POST['heading2'];
        
        // Check if a new image file is uploaded
        if(isset($_FILES['logo2']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK) {
            $aimage = $_FILES['logo2']['name'];
            $fname2 = $_FILES['logo2']['tmp_name'];
            $newfname2 = basename($aimage);
            $targetDir = 'banner/';

            // Ensure the target directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir);
            }

            // Move uploaded file to the target directory
            if(move_uploaded_file($fname2, $targetDir . $newfname2)) {
                // Update product data in the database with new image
                $updateSql = "UPDATE banner SET image = '$newfname2', heading1 = '$heading1', heading2 = '$heading2' WHERE id = '$imageid'";
            } else {
                // Error moving uploaded file
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to move uploaded file.'
                }).then(() => {
                    window.location.href = 'bannerview.php?update=$imageid';
                });
                </script>";
                exit();
            }
        } else {
            // No new image file uploaded, update only name
            $updateSql = "UPDATE banner SET heading1 = '$heading1', heading2 = '$heading2' WHERE id = '$imageid'";
        }
        
        // Execute update query
        if ($conn->query($updateSql)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Record updated successfully!'
            }).then(() => {
                window.location.href = 'bannerview.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error updating record: {$conn->error}'
            }).then(() => {
                window.location.href = 'bannerupdate.php?update=$imageid';
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
            window.location.href = 'bannerupdate.php';
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
                    
                    // Get the prod_id from the URL parameter
                    $imageid = $_GET['update'];
                    
                    // Fetch product data based on prod_id
                    $productQuery = "SELECT * FROM banner WHERE id = '$imageid'";
                    $productResult = $conn->query($productQuery);
                    
                    if ($productResult->num_rows > 0) {
                        $row = $productResult->fetch_assoc();
                        
                        $aimage = 'banner/' . $row['image'];
                        $name1 =  $row['heading1'];
                        $name2 =  $row['heading2'];
                    }
                    ?>
                    <h2 class="mb-4">Banner Image</h2>
                    <form method="POST" enctype="multipart/form-data" class="p-5">
                        <div class="position-relative form-group">
                            <label for="productImage" class="form-label">Banner Sub Heading</label>
                            <input type="text" class="form-control" id="productImage" name="heading1"
                                value="<?php echo $name1; ?>">
                        </div>
                        <div class="position-relative form-group">
                            <label for="productImage" class="form-label">Banner Main Heading</label>
                            <input type="text" class="form-control" id="productImage" name="heading2"
                                value="<?php echo $name2; ?>">
                        </div>
                        <div class="position-relative form-group">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="logo2">
                            <img src="<?php echo $aimage; ?>" style="width:100px; height:50px;">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <a href="bannerview.php" class="btn btn-primary">View</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>