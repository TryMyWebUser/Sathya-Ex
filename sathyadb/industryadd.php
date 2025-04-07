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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'submit' button is clicked
    if (isset($_POST["submit"])) {
        // Escape user inputs for security
        $head1 = mysqli_real_escape_string($conn, $_POST["head1"]);
        $head2 = mysqli_real_escape_string($conn, $_POST["head2"]);
        $head3 = mysqli_real_escape_string($conn, $_POST["head3"]);
        $insertSql = "INSERT INTO industry_page (heading1, heading2, heading3) VALUES ('$head1', '$head2', '$head3')";

        if ($conn->query($insertSql)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Record inserted successfully!'
            }).then(() => {
                window.location.href = 'industryadd.php';
            });
          </script>";
        } else {
            
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error inserting record: {$conn->error}'
            }).then(() => {
                window.location.href = 'industryadd.php';
            });
          </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'warning!',
            text: 'Submit button not clicked.'
        }).then(() => {
            window.location.href = 'industryadd.php';
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
                    <li><span>Industry</span></li>
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
                    <h3 class="card-title">Industry</h3>
                </div>
                <div class="card-body m-t-15">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="position-relative form-group">
                            <label for="heading" class="" style="font-weight:bold; color:black;">Heading</label>
                            <input name="head1" id="" placeholder="Enter the Name" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="heading" class="" style="font-weight:bold; color:black;">Heading 2</label>
                            <input name="head2" id="" placeholder="Enter the Name" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="heading" class="" style="font-weight:bold; color:black;">Description</label>
                            <textarea name="head3" id="" class="form-control" rows="5" col="50"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>