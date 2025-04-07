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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id = $_GET['update']; // Ensure 'update' parameter is set in the URL
    
    // Sanitize user inputs
    $experience = mysqli_real_escape_string($conn, $_POST["heading1"]);
    $head = mysqli_real_escape_string($conn, $_POST["head"]);
    $head2 = mysqli_real_escape_string($conn, $_POST["head2"]);
    $des = mysqli_real_escape_string($conn, $_POST["des"]);

    $img1 = "";
    $img2 = "";
    $img3 = "";

    // Handle file uploads
    if (isset($_FILES['logo1']) && $_FILES['logo1']['error'] === UPLOAD_ERR_OK) {
        $img1 = $_FILES['logo1']['name'];
        $fname1 = $_FILES['logo1']['tmp_name'];
        move_uploaded_file($fname1, "about_images/" . $img1);
    }

    if (isset($_FILES['logo2']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK) {
        $img2 = $_FILES['logo2']['name'];
        $fname2 = $_FILES['logo2']['tmp_name'];
        move_uploaded_file($fname2, "about_images/" . $img2);
    }

    if (isset($_FILES['logo3']) && $_FILES['logo3']['error'] === UPLOAD_ERR_OK) {
        $img3 = $_FILES['logo3']['name'];
        $fname3 = $_FILES['logo3']['tmp_name'];
        move_uploaded_file($fname3, "about_images/" . $img3);
    }

    // Construct the update query
    $updateSql = "UPDATE about_page SET experience = '$experience', heading = '$head', heading2 = '$head2', description = '$des'";
    if ($img1 !== "") {
        $updateSql .= ", img1 = '$img1'";
    }
    if ($img2 !== "") {
        $updateSql .= ", img2 = '$img2'";
    }
    if ($img3 !== "") {
        $updateSql .= ", img3 = '$img3'";
    }
    $updateSql .= " WHERE id = $id";

    if ($conn->query($updateSql)) {
        // Display success message
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Record updated successfully!'
            }).then(() => {
                window.location.href = 'abtimgview2.php';
            });
        </script>";
    } else {
        // Error updating record
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error updating record: " . $conn->error . "',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'abtimgview2.php';
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
                    <li><span>About Page</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">About Page</h3>
            </div>
            <div class="card-body m-t-15">
                <?php
                    include("config.php");
                    
                    // Get the prod_id from the URL parameter
                    $imageid = $_GET['update'];
                    
                    // Fetch product data based on prod_id
                    $productQuery = "SELECT * FROM about_page WHERE id = '$imageid'";
                    $productResult = $conn->query($productQuery);
                    
                    if ($productResult->num_rows > 0) {
                        $row = $productResult->fetch_assoc();
                        
                        $aimage1 = 'about_images/' . $row['img1'];
                        $aimage2 = 'about_images/' . $row['img2'];
                        $aimage3 = 'about_images/' . $row['img3'];
                        $exp =  $row['experience'];
                        $heading =  $row['heading'];
                        $heading2 =  $row['heading2'];
                    }
                    ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label">Experience</label>
                        <input type="text" class="form-control" id="productImage" name="heading1"
                            value="<?php echo $exp?>">
                    </div>
                    <div class="position-relative form-group">
                        <label for="heading" class="" style="font-weight:bold; color:black;">About Heading 1</label>
                        <input name="head" id="" type="text" value="<?php echo $heading?>" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="heading" class="" style="font-weight:bold; color:black;">About Heading 2</label>
                        <input name="head2" id="" type="text" value="<?php echo $heading2?>" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label">Image1</label>
                        <input type="file" class="form-control" id="productImage" name="logo1">
                        <img src="<?php echo $aimage1; ?>" style="width:100px; height:50px;">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label">Image2</label>
                        <input type="file" class="form-control" id="productImage" name="logo2">
                        <img src="<?php echo $aimage2; ?>" style="width:100px; height:50px;">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label">Image3</label>
                        <input type="file" class="form-control" id="productImage" name="logo3">
                        <img src="<?php echo $aimage3; ?>" style="width:100px; height:50px;">
                    </div>
                    <div class="position-relative form-group">
                        <label for="exdes" class="" style="font-weight:bold; color:black;">Description</label>
                        <textarea class="form-control" id="editor" name="des" rows="5"
                            col="5"><?php echo $row['description']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>