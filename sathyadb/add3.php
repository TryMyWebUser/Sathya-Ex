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
    // Escape user inputs for security
    $heading1 = mysqli_real_escape_string($conn, $_POST["heading1"]);
    $heading2 = mysqli_real_escape_string($conn, $_POST["heading2"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $boxContent = mysqli_real_escape_string($conn, $_POST["box"]);

    // Insert data into the database
    $insertSql = "INSERT INTO industry (heading1, heading2, description, box_content) 
                  VALUES ('$heading1', '$heading2', '$description', '$boxContent')";

    if ($conn->query($insertSql)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Record inserted successfully!',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'add3.php';
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
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold"> Heading 1
                        </label>
                        <input type="text" class="form-control" id="productImage" name="heading1">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold"> Heading 2
                        </label>
                        <input type="text" class="form-control" id="productImage" name="heading2">
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Description
                        </label>
                        <textarea class="form-control" id="" name="description" rows="5" col="5"></textarea>
                    </div>
                    <div class="position-relative form-group">
                        <label for="productImage" class="form-label" style="color: black; font-weight:bold">Box Content
                        </label>
                        <textarea class="form-control" id="" name="box" rows="5" col="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>