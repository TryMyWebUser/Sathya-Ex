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

if (isset($_POST["submit"])) {
    // File upload path
    $targetDir = "pics/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Upload file to server
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        // Insert image file name into database
        $insertSql = "INSERT INTO aboutbanner (image) VALUES ('$fileName')";
        if ($conn->query($insertSql)) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Record inserted successfully!'
                    }).then(() => {
                        window.location.href = 'aboutban.php';
                    });
                  </script>";
            exit();
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error inserting record: {$conn->error}'
                    }).then(() => {
                        window.location.href = 'aboutban.php';
                    });
                  </script>";
        }
    }else{
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error uploading file!'
                }).then(() => {
                    window.location.href = 'aboutban.php';
                });
              </script>";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $deleteSql = "DELETE FROM aboutbanner WHERE id = $id";
        if ($conn->query($deleteSql)) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Record deleted successfully!'
                    }).then(() => {
                        window.location.href = 'aboutban.php';
                    });
                  </script>";
            exit();
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error deleting record: {$conn->error}'
                    }).then(() => {
                        window.location.href = 'aboutban.php';
                    });
                  </script>";
        }
    } 
}
?>

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12 col-lg-12 col-md-12 col-12">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs float-right">
                    <li><a href="index.php">Home</a></li>
                    <li><span>About Banner</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="body-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card no-border m-b-30">
                <div class="card-header">
                    <h3 class="card-title">Images</h3>
                </div>
                <div class="card-body m-t-15">
                    <form action="" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="image" class="form-label">Add Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header bg-white">
                            <h3 class="card-title">Images</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Image</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Fetch and display records in the table
                                        $result = $conn->query("SELECT * FROM aboutbanner");
                                        $i=0;
                                        while ($row = $result->fetch_assoc()) {
                                            $i++;
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td><img src='pics/{$row['image']}' alt='Image' style='width:200px; height:50px;'></td>";
                                            echo "<td><a href='?id={$row['id']}&action=delete'><i class='fa fa-trash' style='color:red'></i></a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--JavaScript File -->
<script src="js/vendor/popper.min.js"></script>
<script src="js/jquery-3.4.0.min.js"></script>
<!--Bootstrap Js -->
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/metisMenu.js"></script>
<script src="js/vendor/simple-lightbox.min.js"></script>
<script src="js/vendor/jquery.dataTables.min.js"></script>
<script src="js/vendor/dataTables.bootstrap4.min.js"></script>
<script src="js/custom.js"></script>
<script>
$(document).ready(function() {
    $('#example,#bootstrap-data-table-export').DataTable();
});
</script>
</body>

</html>