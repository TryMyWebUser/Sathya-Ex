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
// Fetch record to edit
if(isset($_GET['update'])) {
    $id = $_GET['update'];
    $sql = "SELECT * FROM industry WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// Update record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $heading1 = mysqli_real_escape_string($conn, $_POST["heading1"]);
    $heading2 = mysqli_real_escape_string($conn, $_POST["heading2"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    
    // Check if a new file is uploaded
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['img']['name'];
        $fname = $_FILES['img']['tmp_name'];
        
        // Delete old image
        if(file_exists('subindu/'.$row['image_name'])) {
            unlink('subindu/'.$row['image_name']);
        }
        
        // Upload new image
        $newfname2 = 'subindu/' . basename($image_name);
        if (move_uploaded_file($fname, $newfname2)) {
            $updateSql = "UPDATE industry SET 
                        heading1 = '$heading1',
                        heading2 = '$heading2',
                        description = '$description',
                        image_name = '$image_name'
                        WHERE id = '$id'";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Sorry, there was an error uploading your file.',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'update3.php?update=$id';
                });
            </script>";
            exit();
        }
    } else {
        // Update without changing image
        $updateSql = "UPDATE industry SET 
                    heading1 = '$heading1',
                    heading2 = '$heading2',
                    description = '$description'
                    WHERE id = '$id'";
    }
    
    if ($conn->query($updateSql)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Record updated successfully!',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'view3.php';
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
                window.location.href = 'update3.php?update=$id';
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
                    <li><span>Update Industry Section Content</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Update Industry Section Content</h3>
            </div>
            <div class="card-body m-t-15">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    
                    <div class="position-relative form-group">
                        <label for="heading1" class="form-label" style="color: black; font-weight:bold">Select Category</label>
                        <select name="heading1" class="form-control">
                            <option>Select Category</option>
                            <?php
                                // Fetch and display records in the table
                                $result = $conn->query("SELECT * FROM title");
                                while ($cat_row = $result->fetch_assoc()) {
                                    $selected = ($cat_row['cat_name'] == $row['heading1']) ? 'selected' : '';
                            ?>
                            <option value="<?= $cat_row['cat_name'] ?>" <?= $selected ?>><?= $cat_row['cat_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="position-relative form-group">
                        <label for="heading2" class="form-label" style="color: black; font-weight:bold">Heading</label>
                        <input type="text" class="form-control" id="heading2" name="heading2" value="<?php echo $row['heading2']; ?>">
                    </div>
                    
                    <div class="position-relative form-group">
                        <label for="description" class="form-label" style="color: black; font-weight:bold">Description</label>
                        <textarea class="form-control" id="editor" name="description" rows="5" col="5"><?php echo $row['description']; ?></textarea>
                    </div>
                    
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Current Image</label><br>
                        <img src="subindu/<?php echo $row['image_name']; ?>" height="100" width="100"><br><br>
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Change Image (Leave blank to keep current)</label>
                        <input type="file" class="form-control" id="productImage" name="img">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    <a href="view3.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>