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

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    // SweetAlert confirmation dialog
    echo "<script>
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to remove this record?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                 window.location.href = 'view3.php?confirmed_delete={$id}';
                } else {
                    // If canceled, stay on the same page
                    window.location.href = 'view3.php';
                }
            });
          </script>";
}

if(isset($_GET['confirmed_delete'])){
    $id = $_GET['confirmed_delete'];
    $sql = "DELETE FROM `industry` WHERE id= '$id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>
                Swal.fire(
                    'Error!',
                    'Error deleting record.',
                    'error'
                ).then(() => {
                    window.location.href = 'view3.php';
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
<div class="row m-5">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-header bg-white">
                <h3 class="card-title">Industry Details</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Access</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    // Fetch data from the products table
                                    include('config.php');
                                    $productQuery = "SELECT * FROM industry";
                                    $productResult = $conn->query($productQuery);

                                    if ($productResult->num_rows > 0) {
                                        $i=0;
                                        while ($row = $productResult->fetch_assoc()) {
                                            $i++;
                                            echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td><img src='subindu/" . $row['image_name'] . "' height='50' width='50'></td>";
                                            echo "<td>" . $row['heading1'] . "</td>";
                                            echo "<td>" . $row['heading2'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            echo "<td style='display:flex;'>                              
                                            <a href='update3.php?update=" . $row['id'] . "' class='btn' style='margin-right:5px;background-color: #8e2655;'>
                                                        <i class='fa fa-edit' style='color: white;'></i></a>
                                            <a href='?delete=" .$row['id'] . "' class='btn btn-danger'>
                                                        <i class='fa fa-trash' style='color: white;'></i></a>
                                                    </td>";
                                                echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No products found.</td></tr>";
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript File -->
<script src="js/vendor/popper.min.js"></script>
<script src="js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap Js -->
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