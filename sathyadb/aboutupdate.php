<?php
session_start();
include("config.php");	
if (!isset( $_SESSION['email_admin'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
include("header.php");?>
<?php include("config.php");

$aboutid = $_GET['update']; 

// Fetch existing data from the database
$sql = "SELECT heading, description FROM about WHERE a_id = '$aboutid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Initialize variables to prevent undefined variable warnings
$Heading = $row['heading'] ?? '';
$Description = $row['description'] ?? '';

if (isset($_POST["submit"])) {
    $Heading = mysqli_real_escape_string($conn, $_POST["head"]);
    $Description = mysqli_real_escape_string($conn, $_POST["des"]);

    $updateSql = "UPDATE about SET heading = '$Heading', description = '$Description' WHERE a_id = '$aboutid'";

    if ($conn->query($updateSql)) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Record Updated successfully!'
        }).then(() => {
            window.location.href = 'aboutview.php';
        });
      </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error updating record: {$conn->error}'
        }).then(() => {
            window.location.href = 'aboutupdate.php';
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
                                <li><span>About</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-white p-5">
                    <h2 class="mb-4">About Us</h2>
                    <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="exname" class="">About</label>
                        <input name="head" id=""  type="text" value="<?php echo $Heading; ?>" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="exdes" class="">Description</label>
                        <textarea class="form-control" id="" name="des" rows="5" col="5" required><?php echo $Description; ?></textarea>
                    </div>
                   
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>
