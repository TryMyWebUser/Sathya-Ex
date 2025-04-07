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

// Insert, Update, Delete operations
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = mysqli_real_escape_string($conn, $_POST["name"]);

    if (!empty($name)) {
        if (!empty($id)) {
            // Update the existing record
            $updateSql = "UPDATE list SET name = '$name' WHERE list_id = $id";
            if ($conn->query($updateSql)) {
                // Record updated successfully
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Record updated successfully!'
                        }).then(() => {
                            window.location.href = 'list.php';
                        });
                    </script>";
            } else {
                // Error updating record
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error updating record: {$conn->error}'
                        });
                    </script>";
            }
        } else {
            // Insert a new record
            $insertSql = "INSERT INTO list (name) VALUES ('$name')";
            if ($conn->query($insertSql)) {
                // Record inserted successfully
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Record inserted successfully!'
                        }).then(() => {
                            window.location.href = 'list.php';
                        });
                    </script>";
            } else {
                // Error inserting record
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error inserting record: {$conn->error}'
                        });
                    </script>";
            }
        }
    }
}

// Delete operation
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];

    // Display confirmation dialog
    echo "<script>
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to delete this record?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with deletion
                    window.location.href = 'list.php?id={$id}&confirmed_delete=true';
                } else {
                    // User cancelled, do nothing or handle differently if needed
                }
            });
          </script>";
}

// Check if confirmed_delete parameter is set
if(isset($_GET['confirmed_delete']) && $_GET['confirmed_delete'] == 'true'){
    $id = $_GET['id'];
    $deleteSql = "DELETE FROM list WHERE list_id = $id";
    if ($conn->query($deleteSql)) {
        // Record deleted successfully
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Record deleted successfully!'
                }).then(() => {
                    window.location.href = 'list.php';
                });
            </script>";
    } else {
        // Error deleting record
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error deleting record: {$conn->error}'
                });
            </script>";
    }
}

// Fetch record for editing
$name = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $selectSql = "SELECT * FROM list WHERE list_id = $id";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
    }
}
?>

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12 col-lg-12 col-md-12 col-12">
            <div class="breadcrumbs-area clearfix">
                <h2 class="page-title float-left">About List Item</h2>
                <ul class="breadcrumbs float-right">
                    <li><a href="index.php">Home</a></li>
                    <li><span>List Item</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <?php
                     echo '<h3 class="f-s-16">Hai '.$_SESSION['email_admin'].'</h3>';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="" method="POST" style="padding:10px;" class="needs-validation" novalidate>
                    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">List Item</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"
                            autocomplete="off" required>
                        <div class="invalid-feedback">Please Enter List Item</div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                // Fetch and display records in the table
                $result = $conn->query("SELECT * FROM list");
                $i=0;
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td><a href='?id={$row['list_id']}'><i class='fa fa-edit' style='color:blue'></i> </a></td>";
                    echo "<td><a href='?id={$row['list_id']}&action=delete'><i class='fa fa-trash' style='color:red'></i></a></td>";
                    echo "</tr>";
                }
                ?>
                        </tbody>
                    </table>
                </div>
                <!-- page header -->
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>