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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $heading1 = mysqli_real_escape_string($conn, $_POST["heading1"]);
    $heading2 = mysqli_real_escape_string($conn, $_POST["heading2"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    // Check if a file is selected
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['img']['name'];
        $fname = $_FILES['img']['tmp_name'];

        // Ensure the 'subindu' directory exists
        if (!is_dir('subindu/')) {
            mkdir('subindu/');
        }

        // Move uploaded file to the 'subindu' directory
        $newfname2 = 'subindu/' . basename($image_name);
        if (move_uploaded_file($fname, $newfname2)) {
            // Insert data into the database
            $insertSql = "INSERT INTO industry (heading1, heading2, description, image_name) 
                        VALUES ('$heading1', '$heading2', '$description', '$image_name')";

            if ($conn->query($insertSql)) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Record inserted successfully!',
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
                        text: 'Error inserting record: " . $conn->error . "',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'add3.php';
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
                    window.location.href = 'add3.php';
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
                window.location.href = 'add3.php';
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
                    <li><span>Industry Section Content</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Industry Section Content</h3>
            </div>
            <div class="card-body m-t-15">
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold"> Select Category
                        </label>
                        <select name="heading1" class="form-control">
                            <option>Select Category</option>
                            <?php
                                // Fetch and display records in the table
                                $result = $conn->query("SELECT * FROM title");
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['cat_name'] ?>"><?= $row['cat_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold"> Heading
                        </label>
                        <input type="text" class="form-control" id="productImage" name="heading2">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Description
                        </label>
                        <textarea class="form-control" id="editor" name="description" rows="5" col="5"></textarea>
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold"> Image
                        </label>
                        <input type="file" class="form-control" id="productImage" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>