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
?>
    <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-lg-12 col-md-12 col-12">
                        <div class="breadcrumbs-area clearfix">
                            <h2 class="page-title float-left">Dashboard</h2>
                            <ul class="breadcrumbs float-right">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-content">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="card m-b-30 no-border">
                            <div class="card-body">
                                <div class="widget-box">
                                    <div class="widget-content">
                                        <div class="widget-title float-left">
                                            <h3 class="f-s-16">CATEGORIES</h3>
                                            <?php
                                include "config.php"; 
                                $sql = "SELECT COUNT(*) AS total_count FROM category";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $total_count = $row['total_count'];
                                    echo' <h3 class="btn" style="background-color:#4941e9; color:white">'. $total_count.'</h3>';
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                mysqli_close($conn);
                                ?>                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="card m-b-30 no-border">
                            <div class="card-body">
                                <div class="widget-box">
                                    <div class="widget-content">
                                        <div class="widget float-left">
                                            <h3 class="f-s-16">PRODUCTS</h3>
                                            <?php
                                include "config.php"; 
                                $sql = "SELECT COUNT(*) AS total_count FROM products";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $total_count = $row['total_count'];
                                           echo ' <h3 class="btn" style="background-color:#34dd87; color:white">'. $total_count.'</h3>';
                                }                            
                            ?>
                                        </div>
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6">
                        <div class="card m-b-30 no-border">
                            <div class="card-body">
                                <div class="widget-box">
                                    <div class="widget-content">
                                        <div class="widget float-left">
                                            <h3 class="f-s-16">GALLERY IMAGES</h3>
                                            <?php
                                include "config.php"; 
                                $sql = "SELECT COUNT(*) AS total_count FROM images";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $total_count = $row['total_count'];
                                    echo '  <h3 class="btn" style="background-color:#f92b8b; color:white">'.$total_count.'</h3>';
                                }                            
                                ?>
                                        </div>
                                       
                                    </div>
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
      <?php
      include("footer.php");
      ?>