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

$aboutid = $_GET['update']; 

// Fetch existing data from the database
$sql = "SELECT heading1, heading2, heading3 FROM industry_page WHERE id = '$aboutid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Initialize variables to prevent undefined variable warnings
$heading1 = $row['heading1'] ?? '';
$heading2 = $row['heading2'] ?? '';
$heading3 = $row['heading3'] ?? '';

if (isset($_POST["submit"])) {
    $Heading1 = mysqli_real_escape_string($conn, $_POST["heading1"]);
    $Heading2 = mysqli_real_escape_string($conn, $_POST["heading2"]);
    $Heading3 = mysqli_real_escape_string($conn, $_POST["heading3"]);

    $updateSql = "UPDATE industry_page SET heading1 = '$Heading1', heading2 = '$Heading2', heading3 = '$Heading3' WHERE id = '$aboutid'";

    if ($conn->query($updateSql)) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Record Updated successfully!'
        }).then(() => {
            window.location.href = 'industryview.php';
        });
      </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error updating record: {$conn->error}'
        }).then(() => {
            window.location.href = 'industryview.php';
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
                    <li><span>Industry Page Content</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row m-5">
    <div class="col-md-12">
        <div class="card no-border m-b-30">
            <div class="card-header">
                <h3 class="card-title">Industry Page Content</h3>
            </div>
            <div class="card-body m-t-15">
                <?php
                        include("config.php");
                        $imageid = $_GET['update'];
                        $productQuery = "SELECT * FROM industry_page WHERE id = '$imageid'";
                        $productResult = $conn->query($productQuery);

                        if ($productResult->num_rows > 0) {
                            $row = $productResult->fetch_assoc();

                            $main_heading =  $row['heading1'];
                            $sub_heading =  $row['heading2'];
                            $list = $row['heading3'];
                        }
                        ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="heading1" class="form-label" style="color: black; font-weight:bold">Heading
                            1</label>
                        <input type="text" class="form-control" id="heading1" name="heading1"
                            value="<?php echo $heading1 ?>">
                    </div>
                    <div class="position-relative form-group">
                        <label for="heading2" class="form-label" style="color: black; font-weight:bold">Heading
                            2</label>
                        <input type="text" class="form-control" id="heading2" name="heading2"
                            value="<?php echo $heading2 ?>">
                    </div>
                    <div class="position-relative form-group">
                        <label for="heading3" class="form-label" style="color: black; font-weight:bold">Heading
                            3</label>
                        <textarea class="form-control" id="heading3" name="heading3"><?php echo $heading3 ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>