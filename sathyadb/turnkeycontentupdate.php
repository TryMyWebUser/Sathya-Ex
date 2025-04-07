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

    if(isset($_GET['update'])) {
        $imageid = $_GET['update'];

        $name = $_POST['name'];

        if(isset($_FILES['logo2']) && $_FILES['logo2']['error'] === UPLOAD_ERR_OK) {
            $aimage = $_FILES['logo2']['name'];
            $fname2 = $_FILES['logo2']['tmp_name'];
            $newfname2 = basename($aimage);
            $targetDir = 'turnkey_category/';

            if (!is_dir($targetDir)) {
                mkdir($targetDir);
            }

            if(move_uploaded_file($fname2, $targetDir . $newfname2)) {

                $updateSql = "UPDATE turnkey_category SET image = '$newfname2', name = '$name' WHERE id = '$imageid'";
            } else {

                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to move uploaded file.'
                }).then(() => {
                    window.location.href = 'turnkeycontentview.php?update=$imageid';
                });
                </script>";
                exit();
            }
        } else {
            $updateSql = "UPDATE turnkey_category SET name = '$name' WHERE id = '$imageid'";
        }

        if ($conn->query($updateSql)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Record updated successfully!'
            }).then(() => {
                window.location.href = 'turnkeycontentview.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error updating record: {$conn->error}'
            }).then(() => {
                window.location.href = 'turnkeycontentview.php?update=$imageid';
            });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Invalid update parameter.'
        }).then(() => {
            window.location.href = 'turnkeycontentview.php';
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
                    <li><span>Turnkey Category</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-header bg-white">
                <h3 class="card-title">Turnkey Category</h3>
            </div>
            <div class="card-body">
                <?php
                        include("config.php");
                        $imageid = $_GET['update'];
                        $productQuery = "SELECT * FROM turnkey_category WHERE id = '$imageid'";
                        $productResult = $conn->query($productQuery);

                        if ($productResult->num_rows > 0) {
                            $row = $productResult->fetch_assoc();

                            $aimage = 'turnkey_category/' . $row['image'];
                            $name =  $row['name'];
                        }
                        ?>
                <form method="POST" enctype="multipart/form-data" class="p-5">
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label">Turnkey Category Name</label>
                        <input type="text" class="form-control" id="productImage" name="name"
                            value="<?php echo $name; ?>">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label">Turnkey Category Image</label>
                        <input type="file" class="form-control" id="productImage" name="logo2">
                        <img src="<?php echo $aimage; ?>" style="width:100px; height:50px;">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <a href="turnkeycontentview.php" class="btn btn-primary">View</a>
                </form>

            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>